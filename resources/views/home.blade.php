@extends('layouts.app')
@section('title','Home')

@section('content')

<!-- Hero Section -->
<section class="bg-primary text-white text-center py-5 mb-5" style="background: linear-gradient(to right, #667eea, #764ba2);">
    <div class="container">
        <h1 class="display-4 fw-bold">Welcome to My Simple Blog</h1>
        <p class="lead">Read articles by category & explore new ideas</p>
        <a href="#recent-posts" class="btn btn-light btn-lg mt-3">View All Posts</a>
    </div>
</section>

<!-- Categories Section -->
<section class="container mb-5">
    <h3 class="mb-3">Categories</h3>
    <div class="d-flex flex-wrap gap-2">
        @foreach($categories as $category)
        <a href="{{ url('/category/'.$category->slug) }}" class="btn btn-outline-primary btn-sm">
            {{ $category->name }}
        </a>
        @endforeach
    </div>
</section>

<!-- Recent Posts Section -->
<section class="container mb-5" id="recent-posts">
    <h3 class="mb-4">Recent Posts</h3>
    <div class="row g-4">
        @foreach($posts as $post)
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                @if($post->category->image)
                <img src="{{ asset('storage/categories/'.$post->category->image) }}" 
                     class="card-img-top" alt="{{ $post->category->name }}" style="height:200px; object-fit:cover;">
                @endif
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <small class="text-muted mb-2">
                        <a href="{{ url('/category/'.$post->category->slug) }}" class="text-decoration-none">
                            {{ $post->category->name }}
                        </a> | {{ $post->published_at?->format('d M Y') }}
                    </small>
                    <p class="card-text">{{ Str::limit($post->content,150) }}</p>
                    <a href="{{ url('/blog/'.$post->slug) }}" class="btn btn-primary mt-auto">Read More</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

@endsection
