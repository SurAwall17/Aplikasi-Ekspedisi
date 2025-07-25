<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => "admin",
            'email' => "admin@admin.com",
            'password' => Hash::make('superadmin123'),
            'role' => "admin",
        ]);

        User::create([
            'name' => "Surawal",
            'email' => "surawal@gmail.com",
            'password' => Hash::make('surawal123'),
            'role' => "user",
            'alamat' => "Pinrang",
            'no_telepon' => "082635343434",
        ]);

        User::create([
            'name' => "Wahyulunajomok",
            'email' => "wahyulunajomok@gmail.com",
            'password' => Hash::make('wahyulunajomok123'),
            'role' => "user",
            'alamat' => "Papua",
            'no_telepon' => "082353434343",
        ]);

        User::create([
            'name' => "Rahman",
            'email' => "rahman@gmail.com",
            'password' => Hash::make('rahman123'),
            'role' => "user",
            'alamat' => "Makassar",
            'no_telepon' => "089837363535",
        ]);

        User::create([
            'name' => "Made",
            'email' => "made@gmail.com",
            'password' => Hash::make('made123'),
            'role' => "user",
            'alamat' => "Makassar",
            'no_telepon' => "081252424232",
        ]);
    }
}
