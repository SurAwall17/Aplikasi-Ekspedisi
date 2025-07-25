<?php

namespace Database\Seeders;

use App\Models\Gudang;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GudangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gudang::create([
            'kode_tempat' => "MKS",
            'alamat' => "Jl. Cakalang IV No.30, Totaka, Kec. Ujung Tanah, Kota Makassar, Sulawesi Selatan 90161",
            'kota' => "Makassar"
        ]);

        Gudang::create([
            'kode_tempat' => "BNE",
            'alamat' => "Barat, Watampone, Tanete Riattang, Bone Regency, South Sulawesi 92711",
            'kota' => "Bone"
        ]);
    }
}
