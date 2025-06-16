<?php

namespace App\Http\Controllers;

use App\Models\Truk;
use App\Models\User;
use App\Models\Gudang;
use App\Models\Pengiriman;
use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    public function dataPengiriman(){
        $id = Auth()->user()->id;
        $data = Pengiriman::with(['user', 'truk', 'gudang'])
                ->where('user_id', $id)
                ->get();

        return view('pengiriman', [
            'title' => 'pengiriman',
            'data' => $data
        ]);
    }

    public function formPengiriman(){
        $user = User::where('role', 'user')->get();
        $gudang = Gudang::all();
        $truk = Truk::all();
        return view('form-pengiriman', [
            'title' => 'pengiriman',
            'user' => $user,
            'gudang' => $gudang,
            'truk' => $truk,
        ]);
    }

    public function tambahPengiriman(Request $request){
        $request->validate([
            'user_id' => 'required',
            'truk_id' => 'required',
            'gudang_id' => 'required',
            'penerima' => 'required|max:255',
            'nohp_penerima' => 'required|max:13',
            'nama_barang' => 'required|max:255',
            'berat' => 'required',
            'volume' => 'required',
            'type' => 'required|max:255',
            'harga' => 'required',
            'tgl_pengiriman' => 'required',
            'status_pengiriman' => 'required'
        ]);

        Pengiriman::create([
            'user_id' => $request->user_id,
            'truk_id' => $request->truk_id,
            'gudang_id' => $request->gudang_id,
            'penerima' => $request->penerima,
            'nohp_penerima' => $request->nohp_penerima,
            'nama_barang' => $request->nama_barang,
            'berat' => $request->berat,
            'volume' => $request->volume,
            'type' => $request->type,
            'harga' => $request->harga,
            'tgl_pengiriman' => $request->tgl_pengiriman,
            'status_pengiriman' => $request->status_pengiriman,
        ]);
        return redirect('/pengiriman');
    }
}
