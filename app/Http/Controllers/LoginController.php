<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login',
            'active' => 'login',
        ]);
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            // 'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            // 'passwordRepeat' => 'required|same:password',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return back()->with('LoginError', 'Login failed!');

        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        //     'passwordRepeat' => 'The provided credentials do not match our records.',
        // ]);

    }
    public function logout(){

        Auth::logout();


        request()->session()->invalidate();
        request()->session()->regenerateToken();

        RETURN REDIRECT('/');

    }

}
