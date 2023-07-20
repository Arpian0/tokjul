<!-- resources/views/layouts/master.blade.php -->

<!DOCTYPE html>
<html>

<head>
    <title>Toko Online</title>
    <!-- Atur tautan CSS dan script JavaScript lainnya -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    @include('layouts.header')

    <div class="container mt-4">
        @yield('content')
    </div>

    @include('layouts.footer')
</body>

</html>
