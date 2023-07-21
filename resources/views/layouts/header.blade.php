<!-- resources/views/layouts/header.blade.php -->

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/beranda">Toko Online</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/beranda">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/keranjang">Keranjang Belanja</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pencarian">Pencarian Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/proses-pemesanan">Proses Pemesanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pembayaran-online">Pembayaran Online</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pusat-bantuan">Pusat Bantuan & FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/tambah-barang">Tambah Barang</a>
                    </li>
                </ul>
            </div>
        </div>
        <div style="text-align: right;padding-right:10px">
            @if (Auth::check())
                <!-- Tombol untuk memicu modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#logoutModal">
                    Logout
                </button>

                <!-- Modal -->
                <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel"
                    aria-hidden="true">
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
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
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
    </nav>
</header>
