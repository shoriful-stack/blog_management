@extends('layouts.app')
@section('title','Dashboard')


@section('content')
<h2>Dashboard</h2>
<div class="row">
    <div class="col-md-4">
        <div class="card p-3">Total Categories: {{ $categories }}</div>
    </div>
    <div class="col-md-4">
        <div class="card p-3">Total Posts: {{ $posts }}</div>
    </div>
</div>
@endsection