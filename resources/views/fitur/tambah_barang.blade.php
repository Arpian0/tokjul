<!-- resources/views/pencarian.blade.php -->

@extends('layouts.master')

@section('content')
    <h1>Tambahkan Produk</h1>
    <!-- Isi konten halaman pencarian produk -->

    <body>
        <div id="app">
            <div class="main-wrapper">
                <div class="main-content">
                    <div class="container">
                        <div class="card mt-5">
                            <div class="card-header">
                                <h3 style="text-align: center">List Product</h3>
                                <div style="text-align: right">
                                    @if (Auth::check())
                                        <!-- Tombol untuk memicu modal -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#logoutModal">
                                            Logout
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="logoutModal" tabindex="-1"
                                            aria-labelledby="logoutModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="logoutModalLabel">Konfirmasi Logout</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div style="text-align: left" class="modal-body">
                                                        Apakah Anda yakin ingin logout?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <!-- Form untuk melakukan logout -->
                                                        <form action="{{ route('logout') }}" method="post">
                                                            @csrf
                                                            <button type="submit" class="btn btn-primary">Logout</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <!-- Tombol untuk login dan register -->
                                    @endif
                                </div>
                            </div>
                            <div class="card-body">
                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif

                                @if (session('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif
                                <p>
                                    <a class="btn btn-primary" href="{{ route('products.create') }}">New Product</a>
                                </p>
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>ID</th>
                                            <th>SKU</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Stock</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($products as $product)
                                            <tr>
                                                <td><img src="{{ asset($product->image) }}" class="img-thumbnail"
                                                        style="width:200px" /></td>
                                                <td>{{ $product->id }}</td>
                                                <td>{{ $product->sku }}</td>
                                                <td>{{ $product->name }}</td>
                                                <td>Rp {{ $product->price }}</td>
                                                <td>{{ $product->stock }}</td>
                                                <td>
                                                    <a href="{{ route('products.show', $product->id) }}"
                                                        class="btn btn-info btn-sm">Show</a>
                                                    <a href="{{ route('products.edit', $product->id) }}"
                                                        class="btn btn-primary btn-sm">Edit</a>
                                                    <form action="{{ route('products.destroy', $product->id) }}"
                                                        method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6">
                                                    No record found!
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection
