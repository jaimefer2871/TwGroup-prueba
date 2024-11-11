<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route("dashboard");
        } else{
            return redirect()->route("login")->with('error','Error al iniciar sesión. Por favor verifique sus datos.');
        }
    }

    public function login(Request $request)
    {

        return view('auth.login');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route("login");
    }
}
