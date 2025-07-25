<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Truk;
use App\Models\User;
use App\Models\Gudang;
use App\Models\Ulasan;
use App\Models\Pengiriman;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PengirimanController extends Controller
{

    public function index(){
        $jumlahUser = User::count();
        $jumlahUlasan = Ulasan::count();
        $jumlahTruk = Truk::count();
        $jumlahPengiriman = Pengiriman::where('status_pengiriman', 'Telah Sampai')->count();
        $title = "home";
        $ulasan = Ulasan::with(['pengiriman', 'user'])
        ->latest()
        ->take(5)
        ->get();
    return view('index', compact(['title', 'ulasan', 'jumlahUser', 'jumlahUlasan', 'jumlahPengiriman', 'jumlahTruk']));
    }

    public function dataPengiriman(){
        $i = 1;
        $id = Auth()->user()->id;
        $bank = Bank::all();
        $data = Pengiriman::with(['user', 'truk', 'gudang'])
                ->where('user_id', $id)
                ->get();

        return view('pengiriman', [
            'i' => $i,
            'title' => 'pengiriman',
            'data' => $data,
            'bank' => $bank
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
            // 'resi' => 'required',
            'user_id' => 'required',
            // 'truk_id' => 'required',
            // 'gudang_id' => 'required',
            'penerima' => 'required|max:255',
            'nohp_penerima' => 'required|max:13',
            'nama_barang' => 'required|max:255',
            'berat' => 'required',
            'volume' => 'required',
            'type' => 'required|max:255',
            'harga' => 'required',
            // 'tgl_pengiriman' => 'required',
            // 'status_pengiriman' => 'required',
            // 'bobot_smart' => 'required'
        ]);

        Pengiriman::create([
            'resi' => "EXP" . Str::upper(Str::random(10)),
            'user_id' => $request->user_id,
            // 'truk_id' => $request->truk_id,
            // 'gudang_id' => $request->gudang_id,
            'penerima' => $request->penerima,
            'nohp_penerima' => $request->nohp_penerima,
            'nama_barang' => $request->nama_barang,
            'berat' => $request->berat,
            'volume' => $request->volume,
            'type' => $request->type,
            'harga' => $request->harga,
            // 'tgl_pengiriman' => $request->tgl_pengiriman,
            // 'status_pengiriman' => $request->status_pengiriman,
            // 'bobot_smart' => $request->bobot,
        ]);
        return redirect('/pengiriman');
    }

    public function lacakBarang($gudang_id)
    {
        $title = "Pengiriman";
        $gudang = Gudang::findOrFail($gudang_id);

        return view('/lacak', compact(['gudang', 'title']));
    }
}
