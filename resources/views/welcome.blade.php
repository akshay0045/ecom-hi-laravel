@extends('layout.master')
@section('content')
    <div id="carouselExampleDark" class="carousel carousel-dark slide mb-5">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            @foreach ($banners as $banner)
                <div class="carousel-item {{ $banner->id == 1 ? 'active' : '' }}" data-bs-interval="10000">
                    <img src="{{ $banner->banner_img }}" class="d-block w-100 h-10" height="300px" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $banner->banner_name }}</h5>
                        <p>{{ $banner->banner_description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    @include('product.tranding',[$products])
@endsection
