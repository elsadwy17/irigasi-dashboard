<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (
            $request->username === 'admin' &&
            $request->password === '12345'
        ) {
            Session::put('logged_in', true);

            return redirect('/dashboard');
        }

        return redirect('/login')
            ->with('error', 'Username atau Password Salah!');
    }

    public function logout()
    {
        Session::forget('logged_in');

        return redirect('/login');
    }
}
