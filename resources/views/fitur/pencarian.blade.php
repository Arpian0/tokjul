<!-- resources/views/pencarian.blade.php -->

@extends('layouts.master')

@section('content')
    <h1>Pencarian Produk</h1>
    <!-- Isi konten halaman pencarian produk -->

    <form action="{{ route('pencarian') }}" method="GET">
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="keyword" placeholder="Cari produk berdasarkan nama...">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Cari</button>
            </div>
        </div>
    </form>

    @if (isset($empty) && $empty)
        <p>Tidak ada hasil pencarian untuk kata kunci yang diberikan.</p>
    @else
        <h2>Hasil Pencarian:</h2>
        <ul>
            @foreach ($products as $product)
                <li><img src="{{ asset($product->image) }}" class="img-thumbnail" style="width:200px" /> :
                    {{ $product->name }} - Rp. {{ $product->price }}

                    <form style="padding-bottom: 30px" action="{{ route('keranjang.tambah', ['id' => $product->id]) }}"
                        method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">Tambahkan {{ $product->name }}</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
