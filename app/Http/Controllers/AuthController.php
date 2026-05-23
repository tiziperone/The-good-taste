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
    // 1. PROCESAR REGISTRO
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

        $user = User::create([
            'name'     => $request->nombre,
            'apellido' => $request->apellido,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'user',
            'active'   => true,
        ]);

        session(['email_registro' => $user->email]);
        $user->notify(new VerificarCuentaNotification());

        return redirect()->route('validacion');
    }

    // 2. VERIFICAR EL CLIC DESDE GMAIL
    public function verificarCorreo(int $id, Request $request): RedirectResponse
    {
        $user = User::findOrFail($id);

        if (!$user->email_verified_at) {
            $user->email_verified_at = now();
            $user->save();
            Auth::login($user);

            return redirect('/pagina-principal')->with('message', '¡Cuenta verificada con éxito! Bienvenido.');
        }

        return redirect('/inicio-sesion');
    }

    // 3. REENVIAR EL CORREO SI NO LLEGÓ
    public function reenviarCorreo(): RedirectResponse
    {
        $email = session('email_registro');

        if ($email) {
            $user = User::where('email', $email)->first();
            if ($user && !$user->email_verified_at) {
                $user->notify(new VerificarCuentaNotification());
                return back()->with('message', '¡Te hemos reenviado el enlace de validación a tu Gmail!');
            }
        }

        return back()->withErrors(['error' => 'No se pudo reenviar el correo. Por favor intente registrarse de nuevo.']);
    }

    // 4. PROCESAR INICIO DE SESIÓN
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

        if (is_null($user->email_verified_at)) {
            session(['email_registro' => $user->email]);
            return redirect()->route('validacion')->with('message', 'Debes verificar tu cuenta en tu correo antes de ingresar.');
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

    // 5. PROCESAR CIERRE DE SESIÓN
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/pagina-principal');
    }


    // RECUPERACIÓN DE CONTRASEÑA MANUAL


    // 6. PROCESAR SOLICITUD DE TOKEN Y ENVIAR MAIL
    // 6. PROCESAR SOLICITUD DE TOKEN Y ENVIAR MAIL (VERSIÓN SIN ARCHIVO BLADE)
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

        // Creamos el enlace que irá dentro del mensaje
        $url = route('password.reset', ['token' => $token, 'email' => $request->email]);

        // Usamos Mail::html para enviar código HTML directo en un string sin usar archivos blade
        $textoHtml = "
        <div style='background-color: #212529; color: white; padding: 20px; font-family: sans-serif; border-radius: 10px;'>
            <h2>Restablecer Contraseña - The Good Taste</h2>
            <p>Recibimos una solicitud para cambiar tu clave. Si fuiste vos, hace clic en el siguiente enlace:</p>
            <p><a href='{$url}' style='color: #ffc107; font-weight: bold;'>Haz clic aquí para restablecer tu contraseña</a></p>
            <br>
            <small style='color: #6c757d;'>Si no funciona el enlace, copia y pega esto en tu navegador: {$url}</small>
        </div>
    ";

        Mail::html($textoHtml, function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Restablecer Contraseña - The Good Taste');
        });

        return back()->with('message', '¡Perfecto! Te enviamos el enlace de recuperación a tu correo electrónico.');
    }

    // 7. MOSTRAR LA PANTALLA PARA INGRESAR LA NUEVA CONTRASEÑA
    public function mostrarFormoRestablecer(string $token, Request $request)
    {
        $email = $request->query('email');

        // Apunta directamente al archivo suelto en /views
        return view('nueva-password', compact('token', 'email'));
    }

    // 8. GUARDAR LA NUEVA CONTRASEÑA CAMBIADA
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

        return redirect()->route('login')->with('message', '¡Tu contraseña ha sido cambiada con éxito! Ya podés iniciar sesión.');
    }
}
