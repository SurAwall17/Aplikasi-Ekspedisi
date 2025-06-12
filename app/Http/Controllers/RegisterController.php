<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function form_register(){
        return view('/register');
    }

    public function register(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'alamat' => 'required|max:255',
            'no_telepon' => 'required|max:255',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => "user",
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
        ]);


        return redirect('/login')->with('success', 'Registrasi Berhasil');
    }
}
