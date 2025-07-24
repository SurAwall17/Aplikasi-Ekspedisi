<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pembayaran;
use App\Models\Pengiriman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    public function pembayaran(Request $request, $id){

        if ($request->hasFile('bukti_bayar')) {
            $file = $request->file('bukti_bayar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/', $filename);

            
            Pembayaran::create([
                'pengiriman_id' => $request->pengiriman_id,
                'user_id' => Auth()->user()->id,
                'metode' => $request->metode,
                'bukti_pembayaran' => $filename,
                'status' => "Menunggu Konfirmasi",
                'tanggal' => Carbon::now(),
            ]);
            
            $pengiriman = Pengiriman::where('user_id', Auth()->user()->id)->where('id', $id)->first();

            if($pengiriman){
                $pengiriman->update([
                    'status_pengiriman' => 'Menunggu Konfirmasi'
                ]);
            }
        }
        return redirect('pengiriman');
    }
}
