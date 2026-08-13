<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">My Shop</a>
            <div class="d-flex gap-2">
                <a class="btn btn-sm btn-outline-dark" href="#products">Products</a>
                <a class="btn btn-sm btn-primary" href="{{ route('admin.products') }}">Admin</a>
            </div>
        </div>
    </nav>

    <section class="bg-white border-bottom">
        <div class="container py-5">
            <div class="row align-items-center g-4">
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold">Simple Ecommerce Frontend</h1>
                    <p class="lead text-muted">Products added from the admin panel will appear here with the static products.</p>
                    <a href="#products" class="btn btn-success">Shop Now</a>
                </div>
                <div class="col-lg-6">
                    <div class="bg-dark text-white p-5 rounded">
                        <h2 class="fw-bold mb-2">New Collection</h2>
                        <p class="mb-0">Bootstrap based clean product UI</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main class="container py-5" id="products">
        <div class="text-center mb-4">
            <h2 class="fw-bold">Products</h2>
            <p class="text-muted">Static products plus products added from the admin panel.</p>
        </div>

        @php
            $staticProducts = [
                [
                    'name' => 'Classic T-Shirt',
                    'price' => '499.00',
                    'description' => 'Soft cotton everyday t-shirt.',
                    'image' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?auto=format&fit=crop&w=600&q=80',
                ],
                [
                    'name' => 'Denim Jacket',
                    'price' => '1499.00',
                    'description' => 'Casual blue denim jacket.',
                    'image' => 'https://images.unsplash.com/photo-1543076447-215ad9ba6923?auto=format&fit=crop&w=600&q=80',
                ],
                [
                    'name' => 'Running Shoes',
                    'price' => '1999.00',
                    'description' => 'Lightweight shoes for daily use.',
                    'image' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=600&q=80',
                ],
                [
                    'name' => 'Leather Bag',
                    'price' => '999.00',
                    'description' => 'Compact bag with clean design.',
                    'image' => 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?auto=format&fit=crop&w=600&q=80',
                ],
            ];
        @endphp

        <div class="row g-4">
            @foreach ($staticProducts as $product)
                <div class="col-sm-6 col-lg-3">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ $product['image'] }}" class="card-img-top" alt="{{ $product['name'] }}" style="height:220px;object-fit:cover;">
                        <div class="card-body">
                            <span class="badge bg-secondary mb-2">Static</span>
                            <h5 class="card-title">{{ $product['name'] }}</h5>
                            <p class="card-text text-muted">{{ $product['description'] }}</p>
                        </div>
                        <div class="card-footer bg-white border-0 pt-0 d-flex justify-content-between align-items-center">
                            <strong>Rs. {{ $product['price'] }}</strong>
                            <button class="btn btn-sm btn-outline-success">Add</button>
                        </div>
                    </div>
                </div>
            @endforeach

            @foreach ($products as $product)
                <div class="col-sm-6 col-lg-3">
                    <div class="card h-100 shadow-sm border-success">
                        @if ($product->image_url)
                            <img src="{{ $product->image_url }}" class="card-img-top" alt="{{ $product->name }}" style="height:220px;object-fit:cover;">
                        @else
                            <div class="bg-white d-flex align-items-center justify-content-center text-muted border-bottom" style="height:220px;">
                                No image
                            </div>
                        @endif
                        <div class="card-body">
                            <span class="badge bg-success mb-2">Admin Added</span>
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text text-muted">{{ $product->description }}</p>
                        </div>
                        <div class="card-footer bg-white border-0 pt-0 d-flex justify-content-between align-items-center">
                            <strong>Rs. {{ number_format($product->price, 2) }}</strong>
                            <button class="btn btn-sm btn-success">Add</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
