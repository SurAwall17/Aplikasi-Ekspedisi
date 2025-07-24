<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = "pembayaran";

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function pengiriman()
    {
        return $this->belongsTo(Pengiriman::class);
    }

}
