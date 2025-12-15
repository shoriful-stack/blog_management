@extends('layouts.app')
@section('title','Edit Category')

@section('content')
<h3 class="mb-3">Edit Category</h3>

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
    action="{{ route('admin.categories.update',$category) }}"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Category Name</label>
        <input type="text" name="name"
            value="{{ $category->name }}"
            class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Description</label>
        <textarea name="description"
            class="form-control">{{ $category->description }}</textarea>
    </div>

    <div class="mb-3">
        <label>Category Image</label>
        <input type="file" name="image" class="form-control">

        @if($category->image)
        <img src="{{ asset('storage/categories/'.$category->image) }}"
            width="100" class="mt-2">
        @endif
    </div>

    <button class="btn btn-primary">Update Category</button>
</form>

@endsection