<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function form_login(){
        return view('/login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->role == "admin") {
                return redirect()->intended('/admin');
                
            }
            return redirect()->intended('/');
        }
 
        return back()->with('error', 'Login Failed!');

    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('logout', 'Berhasil Logout');
    }
}
