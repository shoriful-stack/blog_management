@extends('layouts.app')
@section('title','Home')


@section('content')
<div class="p-5 mb-4 bg-light rounded-3 text-center">
    <h1>Welcome to My Simple Blog</h1>
    <p>Read articles by category</p>
</div>


<h3>Categories</h3>
<div class="mb-4">
    @foreach($categories as $category)
    <a href="/category/{{ $category->slug }}" class="btn btn-outline-primary btn-sm">{{ $category->name }}</a>
    @endforeach
</div>


<h3>Recent Posts</h3>
<div class="row">
    @foreach($posts as $post)
    <div class="col-md-4">
        <div class="card mb-3">
            <div class="card-body">
                <h5>{{ $post->title }}</h5>
                <small class="text-muted">{{ $post->category->name }} | {{ $post->published_at?->format('d M Y') }}</small>
                <p>{{ Str::limit($post->content,120) }}</p>
                <a href="/blog/{{ $post->slug }}" class="btn btn-sm btn-primary">Read More</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection