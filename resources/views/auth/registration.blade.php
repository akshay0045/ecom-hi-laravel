@extends('layout.master')
@section('content')
    <form action="" method="post">
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="name" name="name" value="">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control" id="email" name="email" value="">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="password" name="passwsord">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Confirmed Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="password_confirmed" name="password_confirmed">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-10">
                <button type="button" class="btn btn-primary">Registration</button>
            </div>
        </div>
    </form>
@endsection
