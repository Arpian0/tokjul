<!-- resources/views/beranda.blade.php -->

@extends('layouts.master')

@section('content')
    <div class="jumbotron text-center">
        <h1>Selamat Datang di Toko Kami</h1>
        <p>Toko Online Terbaik untuk Berbagai Produk</p>
        <a style="margin-bottom: 50px" href="{{ route('keranjang') }}" class="btn btn-primary">Keranjang Belanja</a>
    </div>

    <div class="container">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">Harga: Rp {{ number_format($product->price, 3, '.', '.') }}</p>
                            <!-- Jika Anda memiliki deskripsi produk, tambahkan di sini -->
                            <!-- Jika ingin menampilkan tombol "Tambah ke Keranjang", tambahkan di sini -->
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
