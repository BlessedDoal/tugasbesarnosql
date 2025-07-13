<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\TransaksiController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ProductController::class, 'home'])->name('home');

Route::post('/register-user', [AuthController::class, 'register']);
Route::post('/login-user', [AuthController::class, 'login']);
Route::post('/logout-user', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin', function () {
    return view('admin.dashboard-admin');
})->name('admin.dashboard');

Route::get('/admin/upload', [ProductController::class, 'index'])->name('admin.upload');

Route::post('/adminjago/upload-produk', [ProductController::class, 'store'])->name('admin.upload.produk');

Route::post('/adminjago/update-produk/{id}', [ProductController::class, 'update'])->name('admin.update.produk');

Route::post('/keranjang/add', [KeranjangController::class, 'store'])->name('keranjang.add');
Route::get('/keranjang/list', [KeranjangController::class, 'index'])->name('keranjang.list');
Route::delete('/keranjang/item/{id}', [KeranjangController::class, 'destroy'])->name('keranjang.destroy');
Route::patch('/keranjang/item/{id}', [KeranjangController::class, 'updateQuantity'])->name('keranjang.update');

Route::get('/kategori/pakaian', function () { return view('kategori.pakaian'); });
Route::get('/kategori/sepatu', function () { return view('kategori.sepatu'); });
Route::get('/kategori/tas', function () { return view('kategori.tas'); });
Route::get('/transaksi', function () { return view('user.transaksi'); });
Route::post('/transaksi/checkout', [TransaksiController::class, 'store'])->name('transaksi.checkout');
Route::get('/produk/search', [ProductController::class, 'search'])->name('produk.search');
