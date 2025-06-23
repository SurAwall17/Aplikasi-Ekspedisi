<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function pembayaran(Request $request){
        if ($request->hasFile('bukti_bayar')) {
            $file = $request->file('bukti_bayar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/', $filename);

            Pembayaran::create([
                'user_id' => Auth()->user()->id,
                'metode' => $request->metode,
                'bukti_pembayaran' => $filename,
                'status' => "Menunggu Konfirmasi",
                'tanggal' => Carbon::now(),
            ]);
        }
        return redirect('pengiriman');
    }
}
