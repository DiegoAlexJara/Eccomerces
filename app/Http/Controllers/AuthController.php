<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Builder\Function_;

class AuthController extends Controller
{
    public function ShowLogin(){
        return view('login');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        $credenciales = $request->only('email', 'password');
        
        if (!Auth::attempt($credenciales)) {    
            return redirect()->route('login')->with('error', 'USUARIO O CONTRASEÑA INCORECTOS');
        }

        return redirect()->intended('user');
    }

    public function logOut(Request $request){

        // Cerrar la sesión del usuario
        Auth::logout();

        // Invalidar la sesión actual
        $request->session()->invalidate();

        // Regenerar el token de la sesión
        $request->session()->regenerateToken();
        
        // Redirigir al usuario a la página de inicio u otra página
        return redirect()->route('login');

    }
    
}
