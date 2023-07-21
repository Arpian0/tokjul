<!-- resources/views/fitur/konfirmasi_transfer.blade.php -->

@extends('layouts.master')

@section('content')
    <h1>Konfirmasi Pembayaran</h1>
    <p>Silakan lakukan pembayaran transfer bank dengan informasi berikut:</p>

    <div class="alert alert-info">
        <p>Nomor Rekening: 00023131</p>
        <p>Jumlah Tagihan: Rp {{ number_format($totalPrice, 3, '.', '.') }}</p>
        <p>Kode Pembayaran: {{ uniqid() }}</p>
    </div>

    <p>Silakan lakukan transfer dengan tepat hingga 3 digit desimal ke nomor rekening di atas.</p>
    <p>Jika Anda telah melakukan pembayaran, kami akan memproses pesanan Anda setelah pembayaran diverifikasi.</p>

    <div class="text-center mt-4">
        <a href="{{ route('beranda') }}" class="btn btn-primary">Kembali ke Beranda</a>
    </div>
@endsection
