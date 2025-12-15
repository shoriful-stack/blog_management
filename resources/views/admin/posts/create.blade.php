@extends('layouts.app')
@section('title','Add Post')

@section('content')
<h3 class="mb-3">Add New Post</h3>

@if($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="{{ route('admin.posts.store') }}">
    @csrf

    <div class="mb-3">
        <label class="form-label">Post Title</label>
        <input type="text"
            name="title"
            value="{{ old('title') }}"
            class="form-control"
            required>
    </div>

    <div class="mb-3">
        <label class="form-label">Category</label>
        <select name="category_id" class="form-select" required>
            <option value="">-- Select Category --</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}"
                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Content</label>
        <textarea name="content"
            rows="6"
            class="form-control"
            required>{{ old('content') }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-select" required>
            <option value="draft">Draft</option>
            <option value="published">Published</option>
        </select>
    </div>

    <button class="btn btn-success">Save Post</button>
    <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection