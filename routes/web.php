<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\ProductController;

// Route to display a list of products
Route::get('/products', [ProductController::class, 'index'])->name('products.index')->middleware('auth');

// Route to show the form for creating a new product
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

// Route to store a newly created product in storage
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// Route to display the specified product
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

// Route to show the form for editing the specified product
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');

// Route to update the specified product in storage
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');

// Route to remove the specified product from storage
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

use App\Http\Controllers\AuthController;

// Route untuk menampilkan form register dan menghandle register
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

// Route untuk menampilkan form login dan menghandle login
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);

// Route untuk logout
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// routes/web.php

use App\Http\Controllers\HalamanController;

// Rute untuk halaman beranda
Route::get('/beranda', [HalamanController::class, 'beranda'])->name('beranda');

// Rute untuk halaman keranjang belanja
Route::get('/keranjang', [HalamanController::class, 'keranjang'])->name('keranjang');

// Rute untuk halaman pencarian produk
Route::get('/pencarian', [HalamanController::class, 'search'])->name('pencarian');

// Rute untuk halaman pencarian produk
// Route::get('/pencarian', [ProductController::class, 'search'])->name('pencarian');

// Rute untuk halaman beranda
Route::get('/tambah-barang', [HalamanController::class, 'tambahBarang'])->name('tambah_barang');

// Rute untuk halaman proses pemesanan
Route::get('/proses-pemesanan', [HalamanController::class, 'prosesPemesanan'])->name('proses_pemesanan');

// Rute untuk halaman pembayaran online
Route::get('/pembayaran-online', [HalamanController::class, 'pembayaranOnline'])->name('pembayaran_online');

// Rute untuk halaman pusat bantuan dan FAQ
Route::get('/pusat-bantuan', [HalamanController::class, 'pusatBantuan'])->name('pusat_bantuan');

Route::post('/keranjang/tambah/{id}', [HalamanController::class, 'tambahKeKeranjang'])->name('keranjang.tambah');

Route::post('/keranjang/batalkan', [HalamanController::class, 'batalkanKeranjang'])->name('keranjang.batalkan');

Route::post('/keranjang/update/{id}', [HalamanController::class, 'updateKeranjang'])->name('keranjang.update');
Route::post('/keranjang/hapus/{id}', [HalamanController::class, 'hapusItemKeranjang'])->name('keranjang.hapus');
