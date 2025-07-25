<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = "ulasan";

    // public function pengiriman(){
    //     return $this->belongsTo(Pengiriman::class);
    // }
    public function pengiriman()
    {
        return $this->belongsTo(Pengiriman::class, 'pengiriman_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
