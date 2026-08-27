<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Notifications\VerificarCuentaNotification;

class AuthController extends Controller
{
    // Para procesar el registro
    public function registrar(Request $request): RedirectResponse
    {
        $request->validate([
            'nombre'   => 'required|string|max:20',
            'apellido' => 'required|string|max:20',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'terminos' => 'required',
        ], [
            'email.unique' => 'Este correo ya se encuentra registrado.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'nombre.max' => 'El nombre no puede superar los 20 caracteres.',
            'apellido.max' => 'El apellido no puede superar los 20 caracteres.',
        ]);

        // Se crea el usuario ya verificado directamente para evitar el bloqueo SMTP de Render
        $user = User::create([
            'name'              => $request->nombre,
            'apellido'          => $request->apellido,
            'email'             => $request->email,
            'password'          => Hash::make($request->password),
            'role'              => 'user',
            'active'            => true,
            'email_verified_at' => now(), // <-- Nace verificado
        ]);

        // Autenticamos al usuario automáticamente para que empiece a usar la tienda
        Auth::login($user);

        return redirect('/pagina-principal')->with('message', '¡Bienvenido a The Good Taste! Tu cuenta ha sido creada con éxito.');
    }

    // 2. Para cuando el usuario hace click en su gmail (si se usa verificación manual)
    public function verificarCorreo(int $id, Request $request): RedirectResponse
    {
        $user = User::findOrFail($id);

        if (!$user->email_verified_at) {
            $user->email_verified_at = now();
            $user->save();
        }

        Auth::login($user);
        return redirect('/pagina-principal')->with('message', '¡Cuenta verificada con éxito! Bienvenido.');
    }

    // Para reenviar el correo
    public function reenviarCorreo(): RedirectResponse
    {
        $email = session('email_registro') ?? auth()->user()?->email;

        if ($email) {
            $user = User::where('email', $email)->first();
            if ($user) {
                $user->email_verified_at = now();
                $user->save();
                return redirect('/inicio-sesion')->with('message', 'Tu cuenta ha sido validada.');
            }
        }

        return back()->withErrors(['error' => 'No se pudo reenviar el correo.']);
    }

    // Procesa el inicio de sesion
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email_no_existe' => true])->withInput();
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password_incorrecta' => true])->withInput();
        }

        // Si por alguna razón el usuario viejo no tiene email_verified_at, lo validamos al instante
        if (is_null($user->email_verified_at)) {
            $user->email_verified_at = now();
            $user->save();
        }

        $remember = $request->has('remember');
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            if ($user->role === 'admin') {
                return redirect('/pagina-principal')->with('message', '¡Hola Admin! Iniciaste sesión correctamente.');
            }

            return redirect('/pagina-principal');
        }

        return back()->withErrors(['auth_failed' => true])->withInput();
    }

    // Procesar el cierre de sesion
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/pagina-principal');
    }

    // Recuperar contraseña
    public function enviarEnlaceRecuperacion(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ], [
            'email.exists' => 'No encontramos ningún usuario registrado con este correo electrónico.'
        ]);

        $token = Str::random(60);

        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            [
                'token' => $token,
                'created_at' => now()
            ]
        );

        $url = route('password.reset', ['token' => $token, 'email' => $request->email]);

        $textoHtml = "
        <div style='background-color: #212529; color: white; padding: 20px; font-family: sans-serif; border-radius: 10px;'>
            <h2>Restablecer Contraseña - The Good Taste</h2>
            <p>Recibimos una solicitud para cambiar tu clave. Si fuiste vos, hace clic en el siguiente enlace:</p>
            <p><a href='{$url}' style='color: #ffc107; font-weight: bold;'>Haz clic aquí para restablecer tu contraseña</a></p>
            <br>
            <small style='color: #6c757d;'>Si no funciona el enlace, copia y pega esto en tu navegador: {$url}</small>
        </div>
        ";

        try {
            Mail::html($textoHtml, function ($message) use ($request) {
                $message->to($request->email);
                $message->subject('Restablecer Contraseña - The Good Taste');
            });
            return back()->with('message', '¡Perfecto! Te enviamos el enlace de recuperación a tu correo electrónico.');
        } catch (\Exception $e) {
            // Si el servidor de Render bloquea el envío de correo, no rompemos la app
            return back()->with('message', 'Solicitud recibida. Si el servicio de correo está disponible, recibirás el enlace.');
        }
    }

    // Ingresar nueva contraseña
    public function mostrarFormoRestablecer(string $token, Request $request)
    {
        $email = $request->query('email');

        return view('nueva-password', compact('token', 'email'));
    }

    // Guardar nueva contraseña
    public function actualizarPassword(Request $request): RedirectResponse
    {
        $request->validate([
            'token'    => 'required',
            'email'    => 'required|email|exists:users,email',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'password.min'       => 'La nueva contraseña debe tener al menos 8 caracteres.'
        ]);

        $registro = DB::table('password_reset_tokens')
            ->where('email', $request->email)
            ->where('token', $request->token)
            ->first();

        if (!$registro) {
            return back()->withErrors(['error' => 'Este enlace de recuperación ha expirado o no es válido.']);
        }

        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        return redirect()->route('inicio-sesion')->with('message', '¡Tu contraseña ha sido cambiada con éxito! Ya podés iniciar sesión.');
    }
}
