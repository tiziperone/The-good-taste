namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Notifications\VerificarCuentaNotification;

class AuthController extends Controller
{
// 1. PROCESAR REGISTRO
public function registrar(Request $request)
{
// Validamos los datos de entrada según las reglas de tus inputs
$request->validate([
'nombre' => 'required|string|max:255',
'apellido' => 'required|string|max:255',
'email' => 'required|string|email|max:255|unique:users',
'password' => 'required|string|min:8|confirmed',
'terminos' => 'required',
], [
'email.unique' => 'Este correo ya se encuentra registrado.',
'password.confirmed' => 'Las contraseñas no coinciden.',
]);

// Creamos el usuario en la BD (la contraseña se encripta automáticamente)
$user = User::create([
'name' => $request->nombre . ' ' . $request->apellido,
'email' => $request->email,
'password' => Hash::make($request->password),
'role' => 'user', // Por defecto entran como usuario común
'active' => true,
]);

// Guardamos el email en la sesión temporal para el botón de "Reenviar enlace"
session(['email_registro' => $user->email]);

// Enviamos la notificación por correo electrónico
$user->notify(new VerificarCuentaNotification());

// Redirigimos a la pantalla visual de validación que ya diseñaste
return redirect()->route('validacion');
}

// 2. VERIFICAR EL CLIC DESDE GMAIL
public function verificarCorreo($id, Request $request)
{
// Si la URL es válida, buscamos al usuario
$user = User::findOrFail($id);

if (!$user->email_verified_at) {
// Guardamos el timestamp actual en tu campo de la BD
$user->email_verified_at = now();
$user->save();

// Logueamos al usuario automáticamente por comodidad
Auth::login($user);

return redirect('/pagina-principal')->with('message', '¡Cuenta verificada con éxito! Bienvenido.');
}

return redirect('/inicio-sesion');
}

// 3. REENVIAR EL CORREO SI NO LLEGÓ
public function reenviarCorreo()
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
public function login(Request $request)
{
$credentials = $request->validate([
'email' => 'required|email',
'password' => 'required',
]);

// Buscamos si existe el usuario
$user = User::where('email', $request->email)->first();

if (!$user) {
// Si el correo no existe, activa tu tarjeta amarilla de Bootstrap
return back()->withErrors(['email_no_existe' => true])->withInput();
}

// Verificamos si la cuenta está validada por Gmail
if (is_null($user->email_verified_at)) {
session(['email_registro' => $user->email]);
return redirect()->route('validacion')->with('message', 'Debes verificar tu cuenta en tu correo antes de ingresar.');
}

// Intentamos autenticar con las credenciales provistas
$remember = $request->has('remember');
if (Auth::attempt($credentials, $remember)) {
$request->session()->regenerate();

// Si eres Admin, te puede mandar a un panel, sino a la página principal
if ($user->role === 'admin') {
return redirect('/pagina-principal')->with('message', '¡Hola Admin! Iniciaste sesión correctamente.');
}

return redirect('/pagina-principal');
}

// Si la contraseña es incorrecta
return back()->withErrors([
'password' => 'La contraseña ingresada es incorrecta.',
])->withInput();
}
}