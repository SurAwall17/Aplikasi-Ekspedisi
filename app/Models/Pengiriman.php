<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengiriman extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = "pengiriman";

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
}
