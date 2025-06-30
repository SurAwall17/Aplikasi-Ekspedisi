<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function profile($id){
        $user = User::where('id', $id)->first();
        return view('/profile', [
            'title' => 'profile',
            'user' => $user
        ]);
    }

    public function updateProfile(Request $request){
        
        $user = Auth::user();
        $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|unique:users,email,' . $user->id,
            'alamat'      => 'required|string',
            'no_telepon'  => 'required|string|max:20',
            'foto'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Jika ada upload foto baru
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada dan bukan avatar bawaan
            if ($user->foto && Storage::exists('public/foto/' . $user->foto)) {
                Storage::delete('public/foto/' . $user->foto);
            }

            // Simpan foto baru
            $fotoBaru = $request->file('foto')->store('public/foto');
            $user->foto = basename($fotoBaru);
        }

        // Update data user
        $user->name        = $request->name;
        $user->email       = $request->email;
        $user->alamat      = $request->alamat;
        $user->no_telepon  = $request->no_telepon;
        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }
}
