<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transkasi;

class TransaksiController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'metode' => 'required|in:BRI,COD',
            'bukti' => 'nullable|image|max:5120',
        ]);
        $userId = Auth::id();
        $items = \App\Models\Keranjang::where('user_id', $userId)->get();
        if ($items->isEmpty()) {
            return response()->json(['error' => 'Keranjang kosong'], 400);
        }
        $subtotal = $items->sum(function($item) {
            return $item->price * $item->quantity;
        });
        $buktiPath = null;
        if ($request->hasFile('bukti')) {
            $file = $request->file('bukti');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/bukti', $filename);
            $buktiPath = $filename;
        }
        $transaksi = Transkasi::create([
            'user_id' => $userId,
            'items' => $items->toArray(),
            'subtotal' => $subtotal,
            'metode' => $request->metode,
            'bukti' => $buktiPath,
            'status' => 'pending',
        ]);
        // Kosongkan keranjang setelah checkout
        \App\Models\Keranjang::where('user_id', $userId)->delete();
        return response()->json(['success' => true, 'transaksi' => $transaksi]);
    }
}