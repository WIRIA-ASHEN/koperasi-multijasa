<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('loginErr', 'Login Failed!');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->role === 'pengurus') {
            return redirect('/dashboard');
        } elseif ($user->role === 'ketua') {
            return redirect('/ketua-dashboard');
        }

        // Add more roles as needed

        return redirect('/login');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/login');

    }
}
