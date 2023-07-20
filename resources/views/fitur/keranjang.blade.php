<!-- resources/views/keranjang.blade.php -->

@extends('layouts.master')

@section('content')
    <h1>Keranjang Belanja</h1>
    <!-- Isi konten halaman keranjang belanja -->

    @if (Session::has('cart') && count(Session::get('cart')) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach (Session::get('cart') as $productId => $product)
                    <tr>
                        <td><img src="{{ asset($product->image) }}" class="img-thumbnail" style="width: 100px;" /></td>
                        <td>{{ $product->name }}</td>
                        <td>Rp {{ number_format($product->price, 3, '.', '.') }}</td>
                        <td>
                            <form action="{{ route('keranjang.update', ['id' => $productId]) }}" method="POST">
                                @csrf
                                <div class="input-group">
                                    <input type="number" name="quantity" value="{{ $product->quantity }}" min="1"
                                        class="form-control">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                        </td>
                        <td>Rp {{ number_format($product->price * $product->quantity, 3, '.', '.') }}</td>
                        <td>
                            <form action="{{ route('keranjang.hapus', ['id' => $productId]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Keranjang belanja kosong.</p>
    @endif
@endsection
