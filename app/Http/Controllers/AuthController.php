<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'senha' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->senha])) {
            return redirect()->route('dashboard');
        } else {
            Session::flash('login_msg', 'E-mail ou senha incorretos.');
            return redirect()->route('login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
