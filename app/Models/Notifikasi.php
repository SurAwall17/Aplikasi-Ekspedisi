<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = "notifikasi";

    public function user(){
        return $this->belongsTo(User::class);
    }
}
