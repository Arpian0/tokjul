<!-- resources/views/proses_pemesanan.blade.php -->

@extends('layouts.master')

@section('content')
    <h1>Proses Pemesanan</h1>
    <!-- Isi konten halaman proses pemesanan -->
    <p>Berikut adalah detail pesanan Anda:</p>

    <table class="table">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td><img src="{{ asset($product->image) }}" class="img-thumbnail" style="width: 100px;" /></td>
                    <td>{{ $product->name }}</td>
                    <td>Rp {{ number_format($product->price, 3, '.', '.') }}</td>
                    <td>{{ $cart[$product->id]->quantity }}</td>
                    <td>Rp {{ number_format($product->price * $cart[$product->id]->quantity, 3, '.', '.') }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="4" class="text-right"><strong>Total</strong></td>
                <td><strong>Rp {{ number_format($totalPrice, 3, '.', '.') }}</strong></td>
            </tr>
        </tbody>
    </table>

    <div class="text-center">
        <a href="{{ route('keranjang') }}" class="btn btn-secondary">Kembali ke Keranjang</a>
        <a href="{{ route('pembayaran.online') }}" class="btn btn-success">Konfirmasi Pemesanan</a>
    </div>
@endsection
