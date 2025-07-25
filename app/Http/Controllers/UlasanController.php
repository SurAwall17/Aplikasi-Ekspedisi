<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use App\Models\Pengiriman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UlasanController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'pengiriman_id' => 'required|integer',
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'required|string',
        ]);

        Ulasan::create([
            'pengiriman_id' => $request->pengiriman_id,
            'user_id' => Auth::id(),
            'rating' => $request->rating,
            'komentar' => $request->komentar,
            'tgl_ulasan' => now()->toDateString(),
        ]);

        $pengiriman = Pengiriman::find($request->pengiriman_id);

        $pengiriman->update([
            'status_ulasan' => 1
        ]);

        return response()->json(['success' => true]);
    }
}
