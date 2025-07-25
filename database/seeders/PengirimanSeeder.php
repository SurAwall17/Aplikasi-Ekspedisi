<?php

namespace Database\Seeders;

use App\Models\Pengiriman;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PengirimanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pengiriman::create([
            'user_id' => 2,
            'truk_id' => 1,
            'gudang_id' => 1,
            'resi' => "EXP" . Str::upper(Str::random(10)),
            'penerima' => "Anto", 
            'nohp_penerima' => "082373635353",
            'nama_barang' => "Kulkas 2 Pintu",
            'berat' => 37,
            'volume' => 882000,
            'type' => "fragile",
            'harga' => 500000,
            'tgl_pengiriman' => now(),
            'status_pengiriman' => "Menunggu Pembayaran",
            'bobot_smart' => 2.500,
            'status_ulasan' => 0,
        ]);

        Pengiriman::create([
            'user_id' => 3,
            'truk_id' => 2,
            'gudang_id' => 1,
            'resi' => "EXP" . Str::upper(Str::random(10)),
            'penerima' => "Adi", 
            'nohp_penerima' => "083726252525",
            'nama_barang' => "Mesin Cuci",
            'berat' => 7,
            'volume' => 286875,
            'type' => "fragile",
            'harga' => 350000,
            'tgl_pengiriman' => now(),
            'status_pengiriman' => "Sedang Diproses",
            'bobot_smart' => 1.900,
            'status_ulasan' => 0,
        ]);
    }
}
