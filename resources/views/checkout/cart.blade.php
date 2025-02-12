@extends('layout.master')
@section('content')
    <div class="container py-5">
        <h1 class="mb-5">Your Shopping Cart</h1>
        <div class="row">
            <div class="col-lg-8">
                <!-- Cart Items -->
                <div class="card mb-4">
                    <div class="card-body">
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($carts as $item)
                            @php

                                $total = $total + $item->qty * $item->products->product_price;
                            @endphp
                            <div class="row cart-item mb-3">
                                <div class="col-md-3">
                                    <img src="{{ $item->products->product_gallary }}" alt="Product 1"
                                        class="img-fluid rounded">
                                </div>
                                <div class="col-md-5">
                                    <a href="{{ route('product.detail', ['id' => $item->product_id]) }}">
                                        <h5 class="card-title">
                                            {{ $item->products->product_name }}
                                        </h5>
                                    </a>

                                    <p class="text-muted">Category: {{ $item->products->category_id }}</p>
                                </div>
                                <div class="col-md-2">
                                    <div class="input-group">
                                        <button class="btn btn-outline-secondary btn-sm qty_decrement" type="button"
                                            data-product_id="{{ $item->product_id }}"
                                            data-cart_id="{{ $item->id }}">-</button>
                                        <input readonly style="max-width:100px" type="text"
                                            class="form-control  form-control-sm text-center quantity-input"
                                            value="{{ $item->qty }}">
                                        <button class="btn btn-outline-secondary btn-sm qty_increment"
                                            data-product_id="{{ $item->product_id }}" data-cart_id="{{ $item->id }}"
                                            type="button">+</button>
                                    </div>
                                </div>
                                <div class="col-md-2 text-end">
                                    <p class="fw-bold">${{ $item->qty * $item->products->product_price }}</p>
                                    <button class="btn btn-sm btn-outline-danger delete"
                                        data-cart_id="{{ $item->id }}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    </div>
                </div>
                <!-- Continue Shopping Button -->
                <div class="text-start mb-4">
                    <a href="{{ url('/') }}" class="btn btn-outline-primary">
                        <i class="bi bi-arrow-left me-2"></i>Continue Shopping
                    </a>
                </div>
            </div>
            <div class="col-lg-4">
                <!-- Cart Summary -->
                <div class="card cart-summary">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Order Summary</h5>
                        <div class="d-flex justify-content-between mb-3">
                            <span>Subtotal</span>
                            <span>${{ $total }}</span>
                        </div>
                        {{-- <div class="d-flex justify-content-between mb-3">
                            <span>Shipping</span>
                            <span>$10.00</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span>Tax</span>
                            <span>$20.00</span>
                        </div> --}}
                        <hr>
                        <div class="d-flex justify-content-between mb-4">
                            <strong>Total</strong>
                            <strong>${{ $total }}</strong>
                        </div>
                        <a class="btn btn-primary w-100" href="{{ route('user.checkout') }}">Proceed to Checkout</a>
                        {{-- <button class="btn btn-primary w-100">Proceed to Checkout</button> --}}
                    </div>
                </div>
                <!-- Promo Code -->
                {{-- <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Apply Promo Code</h5>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Enter promo code">
                            <button class="btn btn-outline-secondary" type="button">Apply</button>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $(".qty_increment").on('click', function() {
                var product_id = $(this).data('product_id');
                var cart_id = $(this).data('cart_id');
                var qty = $(this).siblings('.quantity-input').val();
                if (qty != 5) {
                    qty = parseInt(qty) + 1;
                    $(this).siblings('.quantity-input').val(qty);
                    $.ajax({
                        url: "{{ url('qtyupdate') }}",
                        type: "POST",
                        data: {

                            product_id: product_id,
                            cart_id: cart_id,
                            qty: qty,
                            _token: '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        success: function(res) {
                            location.reload(true);
                            // $('#state').html('<option value="">-- Select State --</option>');
                            // $.each(res.states, function (key, value) {
                            //     $("#state").append('<option value="' + value.id + '">' + value.name + '</option>');
                            // });
                            // $.each(res.cyls, function (key, value) {
                            //     if(value.name != 0){
                            //         $("#cly_qty").append('<option value="' + value.id + '">' + value.name + '</option>');
                            //     }

                            // });
                        }
                    });
                }
            });

            $(document).ready(function() {
                $(".qty_decrement").on('click', function() {
                    var product_id = $(this).data('product_id');
                    var cart_id = $(this).data('cart_id');
                    var qty = $(this).siblings('.quantity-input').val();
                    if (qty != 1) {
                        qty = parseInt(qty) - 1;
                        $(this).siblings('.quantity-input').val(qty);
                        $.ajax({
                            url: "{{ url('qtyupdate') }}",
                            type: "POST",
                            data: {

                                product_id: product_id,
                                cart_id: cart_id,
                                qty: qty,
                                _token: '{{ csrf_token() }}'
                            },
                            dataType: 'json',
                            success: function(res) {
                                location.reload(true);
                                // $('#state').html('<option value="">-- Select State --</option>');
                                // $.each(res.states, function (key, value) {
                                //     $("#state").append('<option value="' + value.id + '">' + value.name + '</option>');
                                // });
                                // $.each(res.cyls, function (key, value) {
                                //     if(value.name != 0){
                                //         $("#cly_qty").append('<option value="' + value.id + '">' + value.name + '</option>');
                                //     }

                                // });
                            }
                        });
                    }
                })
            });

            $(".delete").on('click', function() {
                var cart_id = $(this).data('cart_id');
                $.ajax({
                    url: "{{ url('cartitemdelete') }}",
                    type: "POST",
                    data: {
                        cart_id: cart_id,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(res) {
                        location.reload(true);

                    }
                });
            });
        });
    </script>
@endsection
