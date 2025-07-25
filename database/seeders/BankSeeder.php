<?php

namespace Database\Seeders;

use App\Models\Bank;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bank::create([
            'nama_bank' => "BCA",
            'gambar' => "bank/bca.png",
            'nama_pemilik' => "JOHAN MALLIE",
            'no_rekening' => "7970032210",
        ]);
    }
}
