@extends('layouts.app')
@section('title',$category->name)


@section('content')
<h2>{{ $category->name }}</h2>


@if($category->posts->count())
@foreach($category->posts as $post)
<div class="border p-3 mb-2">
    <h4>{{ $post->title }}</h4>
    <p>{{ Str::limit($post->content,150) }}</p>
    <a href="/blog/{{ $post->slug }}">Read More</a>
</div>
@endforeach
@else
<p>No posts in this category yet.</p>
@endif
@endsection