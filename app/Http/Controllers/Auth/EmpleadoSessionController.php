<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\EmpleadoUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmpleadoSessionController extends Controller
{
    /**
     * Mostrar la vista de login de empleado.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login_empleado');  // Asegúrate de que el archivo exista
    }

    /**
     * Manejar la autenticación del empleado.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'correo' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $empleado = EmpleadoUser::where('correo', $request->correo)->first();

        if ($empleado && Hash::check($request->password, $empleado->password)) {
            Auth::guard('empleado')->login($empleado);
            return redirect()->intended(route('empleadoUser.dashboard'));  // Ajusta la ruta del dashboard
        }

        return back()->withErrors([
            'correo' => 'Las credenciales no coinciden con nuestros registros.',
        ])->withInput($request->only('correo'));
    }

    /**
     * Cerrar sesión del empleado.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('empleado')->logout(); // Cerrar sesión del empleado
        $request->session()->invalidate(); // Invalidar la sesión
        $request->session()->regenerateToken(); // Regenerar el token CSRF
        
        return redirect('/'); // Redirigir a la página principal o login
    }
}
