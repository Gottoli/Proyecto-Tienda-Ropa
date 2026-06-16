<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Muestra el formulario de registro
    public function formularioRegistro()
    {
        return view('backend.usuarios.registro');
    }

    // Muestra el formulario de login
    public function formularioLogin()
    {
        return view('backend.usuarios.login');
    }

    // Procesa el formulario de registro
    public function registrar(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'rol'      => 'cliente',
        ]);

        return redirect('/login')->with('success', 'Cuenta creada correctamente. Iniciá sesión.');
    }

    // Procesa el formulario de login
    public function autenticar(Request $request)
    {
        $credenciales = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credenciales)) {
            $request->session()->regenerate();

            if (Auth::user()->rol === 'admin') {
                return redirect('/admin');
            }

            return redirect('/cliente');
        }

        return back()->withErrors([
            'email' => 'Email o contraseña incorrectos',
        ]);
    }

    // Cierra la sesión
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}