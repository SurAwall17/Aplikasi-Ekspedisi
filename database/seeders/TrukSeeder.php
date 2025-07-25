<?php

namespace Database\Seeders;

use App\Models\Truk;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TrukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Truk::create([
            'kode_truk' => 'HN-1',
            'nama_truk' => 'HINO'
        ]);

        Truk::create([
            'kode_truk' => 'MS-1',
            'nama_truk' => 'MITSUBISHI'
        ]);

        Truk::create([
            'kode_truk' => 'IZ-1',
            'nama_truk' => 'ISUZU'
        ]);
    }
}
