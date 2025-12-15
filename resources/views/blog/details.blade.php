@extends('layouts.app')
@section('title',$post->title)


@section('content')
<h1>{{ $post->title }}</h1>
<p>
    Category:
    <a href="/category/{{ $post->category->slug }}">{{ $post->category->name }}</a>
</p>
<p>By {{ $post->user->name }} | {{ $post->published_at?->format('d M Y') }}</p>
<hr>
<div>{!! nl2br(e($post->content)) !!}</div>
<a href="/" class="btn btn-secondary mt-3">Back to Home</a>
@endsection