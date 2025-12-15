@extends('layouts.app')
@section('title','Edit Post')

@section('content')
<h3 class="mb-3">Edit Post</h3>

@if($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="{{ route('admin.posts.update',$post) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Post Title</label>
        <input type="text"
            name="title"
            value="{{ old('title',$post->title) }}"
            class="form-control"
            required>
    </div>

    <div class="mb-3">
        <label class="form-label">Category</label>
        <select name="category_id" class="form-select" required>
            @foreach($categories as $category)
            <option value="{{ $category->id }}"
                {{ $post->category_id == $category->id ? 'selected' : '' }}>
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
            required>{{ old('content',$post->content) }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-select" required>
            <option value="draft"
                {{ $post->status=='draft'?'selected':'' }}>Draft</option>
            <option value="published"
                {{ $post->status=='published'?'selected':'' }}>Published</option>
        </select>
    </div>

    @if($post->published_at)
    <p class="text-muted">
        Published at: {{ $post->published_at->format('d M Y') }}
    </p>
    @endif

    <button class="btn btn-primary">Update Post</button>
    <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection