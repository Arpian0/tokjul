<!-- resources/views/pembayaran_online.blade.php -->

@extends('layouts.master')

@section('content')
    <h1>Pembayaran Online</h1>
    <!-- Isi konten halaman pembayaran online -->
    <p>Berikut adalah detail pesanan Anda:</p>

    <!-- Modal Konfirmasi -->
    <div class="modal fade" id="konfirmasiModal" tabindex="-1" role="dialog" aria-labelledby="konfirmasiModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="konfirmasiModalLabel">Konfirmasi Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Pemesananmu Sudah Benar Dengan Apa yang Kamu Inginkan?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <form action="{{ route('konfirmasi.transfer') }}" method="GET" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-success">Ya, Bayar Sekarang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
                    <td>{{ $cart[$product->id]['quantity'] }}</td>
                    <td>Rp {{ number_format($product->price * $cart[$product->id]['quantity'], 3, '.', '.') }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="4" class="text-right"><strong>Total</strong></td>
                <td><strong>Rp {{ number_format($totalPrice, 3, '.', '.') }}</strong></td>
            </tr>
        </tbody>
    </table>

    <div class="text-right">
        <strong>Total Harga: Rp {{ number_format($totalPrice, 3, '.', '.') }}</strong>
    </div>

    <div class="text-center mt-4">
        <a href="{{ route('keranjang') }}" class="btn btn-secondary">Kembali ke Keranjang</a>

        <!-- Tombol Bayar Sekarang -->
        <form action="{{ route('konfirmasi.transfer') }}" method="GET" style="display: inline;">
            @csrf
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#konfirmasiModal">
                Bayar Sekarang
            </button>
        </form>
    </div>
@endsection
