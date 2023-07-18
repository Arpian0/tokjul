<!doctype html>
<html lang="en">

<head>
    <!-- Your head content remains unchanged -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="main-content">
                <div class="container">
                    <div class="card mt-5">
                        <div class="card-header">
                            <h3>Product Details</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{ asset($product->image) }}" alt="Product Image" class="img-thumbnail"
                                        style="width: 200px;">
                                </div>
                                <div class="col-md-8">
                                    <p><strong>ID:</strong> {{ $product->id }}</p>
                                    <p><strong>SKU:</strong> {{ $product->sku }}</p>
                                    <p><strong>Name:</strong> {{ $product->name }}</p>
                                    <p><strong>Price:</strong> ${{ $product->price }}</p>
                                    <p><strong>Stock:</strong> {{ $product->stock }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
