<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengiriman extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = "pengiriman";

   public static $bobot = [
        'harga'  => 0.4,
        'berat'  => 0.3,
        'volume' => 0.2,
        'tipe'   => 0.1,
    ];

    protected static function boot()
    {
        parent::boot();

        // Hitung otomatis saat data dibuat
        static::creating(function ($pengiriman) {
            $pengiriman->bobot_smart = self::hitungSmartPerRow($pengiriman);
            $pengiriman->resi = "EXP" . Str::upper(Str::random(10));
            $pengiriman->status_pengiriman = "Menunggu Pembayaran";
        });

        static::updating(function ($pengiriman) {
            $pengiriman->bobot_smart = self::hitungSmartPerRow($pengiriman);
        });
    }

    // Fungsi untuk konversi range -> skor, lalu hitung SMART
    public static function hitungSmartPerRow($p)
    {
        // --- Konversi Harga ---
        if ($p->harga >= 1000000) {
            $hargaScore = 5;
        } elseif ($p->harga >= 500000) {
            $hargaScore = 4;
        } elseif ($p->harga >= 350000) {
            $hargaScore = 3;
        } elseif ($p->harga >= 150000) {
            $hargaScore = 2;
        } else {
            $hargaScore = 1;
        }

        // --- Konversi Berat ---
        if ($p->berat >= 1000) { // 1 ton = 1000 kg
            $beratScore = 5;
        } elseif ($p->berat >= 300) {
            $beratScore = 4;
        } elseif ($p->berat >= 100) {
            $beratScore = 3;
        } elseif ($p->berat >= 50) {
            $beratScore = 2;
        } else {
            $beratScore = 1;
        }

        // --- Konversi Volume ---
        if ($p->volume >= 2000000) {
            $volumeScore = 5;
        } elseif ($p->volume >= 1000000) {
            $volumeScore = 4;
        } elseif ($p->volume >= 500000) {
            $volumeScore = 3;
        } elseif ($p->volume >= 200000) {
            $volumeScore = 2;
        } else {
            $volumeScore = 1;
        }

        // --- Konversi Tipe ---
        $tipeScore = (strtolower($p->tipe) === 'fragile') ? 1 : 0;

        // --- Hitung Bobot SMART ---
        $qi = 
            (self::$bobot['harga']  * $hargaScore) +
            (self::$bobot['berat']  * $beratScore) +
            (self::$bobot['volume'] * $volumeScore) +
            (self::$bobot['tipe']   * $tipeScore);

        return round($qi, 3);
    }

    // Relasi
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function ulasan(){
        return $this->hasOne(Ulasan::class);
    }
    public function truk(){
        return $this->belongsTo(Truk::class);
    }
    public function gudang(){
        return $this->belongsTo(Gudang::class);
    }
    public function pembayaran(){
        return $this->hasOne(Pembayaran::class);
    }
}
