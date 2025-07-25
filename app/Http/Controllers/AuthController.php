<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
       public function showLoginForm()
    {
        Log::info("Data");
        

        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('auth.login');
    }
    

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate(); 
            return redirect()->intended(route('admin.dashboard'));
        }
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ])->onlyInput('email'); 
    }

    public function logout(Request $request)
    {
        Auth::logout(); 

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/'); 
    }
}
