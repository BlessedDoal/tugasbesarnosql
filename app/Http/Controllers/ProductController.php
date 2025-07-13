<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transkasi;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
            'status' => 'required|in:active,inactive',
        ]);

        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/products', $filename);
            $data['image'] = $filename;
        }

        Product::create($data);

        return back()->with('success', 'Produk berhasil disimpan!');
    }

    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        $totalProduk = $products->count();
        $totalPakaian = $products->where('category', 'Pakaian')->count();
        $totalTas = $products->where('category', 'Tas')->count();
        $totalSepatu = $products->where('category', 'Sepatu')->count();
        return view('admin.upload-produk', compact('products', 'totalProduk', 'totalPakaian', 'totalTas', 'totalSepatu'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
            'status' => 'required|in:active,inactive',
        ]);

        $product = Product::findOrFail($id);
        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/products', $filename);
            $data['image'] = $filename;
        }
        $product->update($data);

        return redirect()->back()->with('success', 'Produk berhasil diupdate!');
    }

    public function getBestSellerProducts($limit = 4)
    {
        // Ambil semua transaksi
        $transaksis = Transkasi::all();
        $productSales = [];
        foreach ($transaksis as $transaksi) {
            if (!is_array($transaksi->items)) continue;
            foreach ($transaksi->items as $item) {
                $pid = $item['product_id'] ?? $item['product_id'] ?? null;
                if (!$pid) continue;
                if (!isset($productSales[$pid])) {
                    $productSales[$pid] = 0;
                }
                $productSales[$pid] += $item['quantity'] ?? 1;
            }
        }
        // Urutkan berdasarkan quantity terbanyak
        arsort($productSales);
        $topProductIds = array_slice(array_keys($productSales), 0, $limit);
        // Ambil data produk dari koleksi Product
        $produkRekomendasi = Product::whereIn('_id', $topProductIds)->get();
        // Urutkan sesuai urutan sales
        $produkRekomendasi = $produkRekomendasi->sortBy(function($prod) use ($topProductIds) {
            return array_search($prod->_id, $topProductIds);
        });
        return $produkRekomendasi;
    }

    public function home()
    {
        $products = Product::where('status', 'active')->orderBy('created_at', 'desc')->get();
        $pakaian = $products->where('category', 'Pakaian');
        $sepatu = $products->where('category', 'Sepatu');
        $tas = $products->where('category', 'Tas');
        $produkRekomendasi = $this->getBestSellerProducts(4);
        return view('welcome', compact('pakaian', 'sepatu', 'tas', 'produkRekomendasi'));
    }

    public function search(Request $request)
    {
        $q = $request->query('q', '');
        if (!$q) return response()->json([]);
        $products = Product::where('name', 'like', '%' . $q . '%')
            ->where('status', 'active')
            ->orderBy('name')
            ->limit(10)
            ->get(['_id', 'name', 'price', 'image', 'category']);
        // Format id agar JS bisa pakai id atau _id
        $products = $products->map(function($p) {
            return [
                'id' => $p->_id,
                'name' => $p->name,
                'price' => $p->price,
                'image' => $p->image,
                'category' => $p->category,
            ];
        });
        return response()->json($products);
    }
} 