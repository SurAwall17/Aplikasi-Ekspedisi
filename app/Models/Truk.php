<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truk extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = "truk";

    public function pengiriman(){
        return $this->hasOne(Pengiriman::class);
    }
}
