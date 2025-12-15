@extends('layouts.app')
@section('content')

<h3>Posts</h3>
<a href="{{ route('admin.posts.create') }}" class="btn btn-success mb-2">Add Post</a>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>Title</th>
        <th>Category</th>
        <th>Status</th>
        <th>Published</th>
        <th>Action</th>
    </tr>

    @foreach($posts as $post)
    <tr>
        <td>{{ $post->title }}</td>
        <td>{{ $post->category->name }}</td>
        <td>{{ ucfirst($post->status) }}</td>
        <td>{{ $post->published_at?->format('d M Y') ?? '-' }}</td>
        <td>
            <a href="{{ route('admin.posts.edit',$post) }}"
                class="btn btn-sm btn-warning">Edit</a>

            <form method="POST"
                action="{{ route('admin.posts.destroy',$post) }}"
                style="display:inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger"
                    onclick="return confirm('Delete this post?')">
                    Delete
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

@endsection