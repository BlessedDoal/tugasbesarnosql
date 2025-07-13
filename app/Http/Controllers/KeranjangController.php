<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keranjang;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,_id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::find($request->product_id);
        if (!$product) {
            return response()->json(['error' => 'Produk tidak ditemukan'], 404);
        }

        $keranjang = Keranjang::create([
            'user_id' => Auth::id(),
            'product_id' => $product->_id,
            'quantity' => $request->quantity,
            'name' => $product->name,
            'price' => $product->price,
            'image' => $product->image,
            'category' => $product->category,
        ]);

        return response()->json(['success' => true, 'keranjang' => $keranjang]);
    }

    public function index()
    {
        $items = Keranjang::where('user_id', Auth::id())->get();
        $subtotal = $items->sum(function($item) {
            return $item->price * $item->quantity;
        });
        return response()->json([
            'items' => $items,
            'subtotal' => $subtotal
        ]);
    }

    public function destroy($id)
    {
        $item = Keranjang::where('_id', $id)->where('user_id', Auth::id())->first();
        if (!$item) {
            return response()->json(['error' => 'Item tidak ditemukan'], 404);
        }
        $item->delete();
        return response()->json(['success' => true]);
    }

    public function updateQuantity(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);
        $item = Keranjang::where('_id', $id)->where('user_id', Auth::id())->first();
        if (!$item) {
            return response()->json(['error' => 'Item tidak ditemukan'], 404);
        }
        $item->quantity = $request->quantity;
        $item->save();
        return response()->json(['success' => true, 'item' => $item]);
    }
}