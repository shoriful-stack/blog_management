@extends('layouts.app')
@section('title','Add Category')

@section('content')
<h3 class="mb-3">Add New Category</h3>

@if($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST"
    action="{{ route('admin.categories.store') }}"
    enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label>Category Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label>Category Image</label>
        <input type="file" name="image" class="form-control">
    </div>

    <button class="btn btn-success">Save Category</button>
    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection