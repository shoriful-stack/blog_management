@extends('layouts.app')
@section('title','Dashboard')

@section('content')
<h2 class="mb-4">Dashboard</h2>

<div class="row">
    <div class="col-md-4">
        <a href="categories">
            <div class="card text-white bg-primary mb-3 shadow">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Categories</h5>
                    <h2>{{ $categories }}</h2>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-4">
        <a href="posts">
            <div class="card text-white bg-success mb-3 shadow">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Posts</h5>
                    <h2>{{ $posts }}</h2>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection