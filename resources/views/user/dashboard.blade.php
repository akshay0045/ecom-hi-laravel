@extends('layout.master')
@section('content')
    <div class="container">
        <div class="row">
            @include("user.".$sidebar)
            @include("user.".$page,['data' => $data])
        @endsection
