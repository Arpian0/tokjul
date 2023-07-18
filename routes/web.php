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
