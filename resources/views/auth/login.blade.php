@extends('layouts.app')
@section('title','Login')


@section('content')
<div class="row justify-content-center">
    <div class="col-md-4">
        <h3>Admin Login</h3>
        <form method="POST" action="/login">@csrf
            <div class="mb-2">
                <input type="email" name="email" class="form-control" placeholder="Email">
            </div>
            <div class="mb-2">
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <button class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</div>
@endsection