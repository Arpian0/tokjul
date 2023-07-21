<?php

// app/Http/Controllers/HalamanController.php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HalamanController extends Controller
{
    public function beranda()
    {
        // Ambil data produk dari database (misalnya, ambil 6 produk terbaru)
        $products = Product::orderBy('created_at', 'desc')->take(6)->get();

        return view('fitur.beranda', compact('products'));
    }

    public function keranjang()
    {
        // Logika untuk menampilkan halaman keranjang belanja
        return view('fitur/keranjang');
    }

    public function tambahKeKeranjang($id)
    {
        // Get the product by ID
        $product = Product::findOrFail($id);

        // Add the product to the shopping cart
        $cart = Session::get('cart', []);
        $cart[$product->id] = $product;
        Session::put('cart', $cart);

        return redirect()->route('keranjang')->with('success', 'Produk berhasil ditambahkan ke keranjang belanja.');
    }

    public function updateKeranjang(Request $request, $id)
    {
        $quantity = $request->input('quantity', 1);

        // Ensure the quantity is a positive integer
        $quantity = max(1, floatval($quantity));

        // Update the cart with the new quantity
        $cart = Session::get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]->quantity = $quantity;
            Session::put('cart', $cart);
        }

        $formattedQuantity = number_format($quantity, 0, ',', '.');

        return redirect()->back()->with('success', 'Jumlah barang diperbarui.');
    }

    public function hapusItemKeranjang($id)
    {
        // Remove the item from the cart
        $cart = Session::get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            Session::put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Item dihapus dari keranjang.');
    }

    // public function pencarian()
    // {
    //     $products = Product::all();
    //     // Logika untuk menampilkan halaman pencarian produk
    //     return view('fitur/pencarian', compact('products'));
    // }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        // Cari produk berdasarkan nama yang sesuai dengan keyword yang diberikan
        $products = Product::where('name', 'like', '%' . $keyword . '%')->get();

        if ($products->isEmpty()) {
            $empty = true;
            return view('fitur.pencarian', compact('empty'));
        } else {
            return view('fitur.pencarian', compact('products'));
        }
    }

    public function tambahBarang()
    {
        $products = Product::all();
        // Logika untuk menampilkan halaman pencarian produk
        return view('fitur/tambah_barang', compact('products'));
    }

    public function prosesPemesanan()
    {
        // Ambil data keranjang belanja dari sesi
        $cart = Session::get('cart', []);

        // Jika keranjang belanja tidak kosong, kirimkan data produk ke halaman proses pemesanan
        if (!empty($cart)) {
            // Mengambil semua produk yang ada di keranjang berdasarkan ID
            $productIds = array_keys($cart);
            $products = Product::whereIn('id', $productIds)->get();

            // Hitung total harga pesanan
            $totalPrice = 0;
            foreach ($products as $product) {
                $totalPrice += $product->price * $cart[$product->id]['quantity'];
            }

            // Tampilkan halaman proses pemesanan dengan data produk dan total harga
            return view('fitur/proses_pemesanan', compact('products', 'totalPrice', 'cart'));
        } else {
            // Jika keranjang belanja kosong, kembalikan ke halaman keranjang
            return redirect()->route('keranjang')->with('error', 'Keranjang belanja kosong.');
        }
    }

    public function pembayaranOnline()
    {
        // Ambil data keranjang belanja dari sesi
        $cart = Session::get('cart', []);

        // Jika keranjang belanja tidak kosong, kirimkan data produk ke halaman pembayaran online
        if (!empty($cart)) {
            // Mengambil semua produk yang ada di keranjang berdasarkan ID
            $productIds = array_keys($cart);
            $products = Product::whereIn('id', $productIds)->get();

            // Hitung total harga pesanan
            $totalPrice = 0;
            foreach ($products as $product) {
                $totalPrice += $product->price * $cart[$product->id]['quantity'];
            }

            // Tampilkan halaman pembayaran online dengan data produk dan total harga
            return view('fitur/pembayaran_online', compact('products', 'totalPrice', 'cart'));
        } else {
            // Jika keranjang belanja kosong, kembalikan ke halaman keranjang
            return redirect()->route('keranjang')->with('error', 'Keranjang belanja kosong.');
        }
    }

    public function konfirmasiTransfer()
    {
        // Ambil data keranjang belanja dari sesi
        $cart = Session::get('cart', []);

        // Hitung total harga pesanan
        $totalPrice = 0;
        foreach ($cart as $product) {
            $totalPrice += $product['price'] * $product['quantity'];
        }

        // Tampilkan halaman konfirmasi pembayaran
        return view('fitur.konfirmasi_transfer', compact('totalPrice'));
    }

    public function pusatBantuan()
    {
        return view('fitur.pusat_bantuan');
    }
}
