@extends('layout.master')
@section('content')
<div class="row">
    @foreach ($products as $product)
        <div class="col-sm-4 mb-4">
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    <span class="badge text-bg-primary">Tranding</span>
                  </div>
                <img src="{{ $product->product_gallary }}" class="card-img-top mt-2" alt="..." style="height: 300px">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->product_name }}</h5>
                    <p class="card-text">{{ $product->product_description }}</p>
                    <p class="card-text">${{ $product->product_price }}</p>
                    <a href="{{ route('product.detail',['id' => $product->id]) }}" class="btn btn-primary">View</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection
