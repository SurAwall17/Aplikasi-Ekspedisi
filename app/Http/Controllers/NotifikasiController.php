<?php

namespace App\Http\Controllers;

use App\Models\Pengiriman;
use Illuminate\Http\Request;

class NotifikasiController extends Controller
{
    public function notifikasi(){
        $pengiriman = Pengiriman::where('user_id', Auth()->user()->id)->get();
        return view('notifikasi', [
            'pengiriman' => $pengiriman,
            'title' => 'Notifikasi'
        ]);
    }
}
