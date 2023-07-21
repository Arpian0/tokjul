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
        // Logika untuk menampilkan halaman beranda
        return view('fitur/beranda');
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
            return view('fitur/pencarian', ['empty' => true]);
        } else {
            return view('fitur/pencarian', compact('products'));
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
        // Logika untuk menampilkan halaman pembayaran online
        return view('fitur/pembayaran_online');
    }

    public function pusatBantuan()
    {
        // Logika untuk menampilkan halaman pusat bantuan dan FAQ
        return view('fitur/pusat_bantuan');
    }
}
