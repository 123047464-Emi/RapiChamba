<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function login(Request $request)
    {
        //Valida los datos
        $credentials= $request->validate ([
            'email'=>['required', 'email'],
            'password'=>['requiered']
        ]);

        //Intenta iniciar sesión 
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/home'); // Redirige al home o dashboard
        }

        // Si falla
        return back()->withErrors([
            'email' => 'Las credenciales no son correctas.',
        ]);
    }
}
