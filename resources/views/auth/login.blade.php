@extends('layout.master')
@section('content')
    <form action="{{ route('user.login') }}" method="post">
        @csrf
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control mb-2 @error('email') is-invalid @enderror" id="email"
                    name="email" value="">
                @if ($errors->has('email'))
                    @foreach ($errors->get('email') as $message)
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @endforeach
                @endif
            </div>

        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control mb-2 @error('password') is-invalid @enderror" id="password" name="password">
                @if ($errors->has('password'))
                    @foreach ($errors->get('password') as $message)
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </div>
    </form>
@endsection
