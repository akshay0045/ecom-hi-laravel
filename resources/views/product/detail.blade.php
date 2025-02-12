@extends('layout.master')
@section('content')
    <div class="container mt-5">
        @session('success')
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endsession
        <div class="row">
            <!-- Product Images -->
            <div class="col-md-6 mb-4">
                <img src="{{ $product->product_gallary }}" alt="Product" class="img-fluid rounded mb-3 product-image"
                    id="mainImage">
                <div class="d-flex justify-content-between">
                    <img src="{{ $product->product_gallary }}" alt="Thumbnail 1" class="thumbnail rounded active"
                        onclick="changeImage(event, this.src)">
                    <img src="{{ $product->product_gallary }}" alt="Thumbnail 2" class="thumbnail rounded"
                        onclick="changeImage(event, this.src)">
                    <img src="{{ $product->product_gallary }}" alt="Thumbnail 3" class="thumbnail rounded"
                        onclick="changeImage(event, this.src)">
                    <img src="{{ $product->product_gallary }}" alt="Thumbnail 4" class="thumbnail rounded"
                        onclick="changeImage(event, this.src)">
                </div>
            </div>

            <!-- Product Details -->
            <div class="col-md-6">
                <a href="{{ url('/') }}">Go Back</a>
                <h2 class="mb-3">{{ $product->product_name }}</h2>
                <p class="text-muted mb-4">SKU: WH1000XM4</p>
                <p class="text-muted mb-4">Category: {{ $product->category_id }}</p>
                <div class="mb-3">
                    <span class="h4 me-2">${{ $product->product_price }}</span>
                    <span class="text-muted"><s>$20000</s></span>
                </div>
                <div class="mb-3">
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-fill text-warning"></i>
                    <i class="bi bi-star-half text-warning"></i>
                    <span class="ms-2">4.5 (120 reviews)</span>
                </div>
                <p class="mb-4">{{ $product->product_description }}</p>
                @if(Auth::check())
                <form action="{{ route('product.addtocart') }}" method="post">
                    @csrf
                    <div class="mb-4">
                        <label for="quantity" class="form-label">Quantity:</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" value="1" min="1" style="width: 80px;">
                        <input type="hidden" name="product_id" value="{{ $product->id }}" />
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
                    </div>
                    <button class="btn btn-primary btn-lg mb-3 me-2" type="submit">
                        <i class="bi bi-cart-plus"></i> Add to Cart
                    </button>
                </form>
                @else
                    Not Authorized to add to cart
                @endif
                <button class="btn btn-outline-secondary btn-lg mb-3">
                    <i class="bi bi-heart"></i> Add to Wishlist
                </button>
                <div class="mt-4">
                    <h5>Key Features:</h5>
                    <ul>
                        <li>Industry-leading noise cancellation</li>
                        <li>30-hour battery life</li>
                        <li>Touch sensor controls</li>
                        <li>Speak-to-chat technology</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script>
        function changeImage(event, src) {
            document.getElementById('mainImage').src = src;
            document.querySelectorAll('.thumbnail').forEach(thumb => thumb.classList.remove('active'));
            event.target.classList.add('active');
        }
    </script>
@endsection
