@extends('layouts.app')
@section('content')
<div class="max-w-6xl mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-6 text-orange-600">Kategori: Sepatu</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-xl shadow-md p-6 flex flex-col items-center">
            <img src="https://via.placeholder.com/120" class="mb-4 rounded-lg" alt="Sepatu">
            <div class="font-bold mb-2">Sneakers Casual</div>
            <div class="text-gray-500 mb-2">Rp 299.000</div>
            <a href="#" class="px-4 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700">Tambah ke Keranjang</a>
        </div>
    </div>
</div>
@endsection 