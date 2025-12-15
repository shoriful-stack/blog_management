@extends('layouts.app')
@section('content')
<h3>Categories</h3>
<a href="{{ route('admin.categories.create') }}" class="btn btn-success mb-2">Add Category</a>
<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Image</th>
        <th>Action</th>
    </tr>
    @foreach($categories as $category)
    <tr>
        <td>{{ $category->name }}</td>
        <td>{{ $category->description }}</td>
        <td>
            @if($category->image)
            <img
                src="{{ asset('storage/categories/'.$category->image) }}"
                alt="{{ $category->name }}"
                width="80"
                class="img-thumbnail">
            @else
            <span class="text-muted">No Image</span>
            @endif
        </td>

        <td>
            <a href="{{ route('admin.categories.edit',$category) }}" class="btn btn-sm btn-warning">Edit</a>
            <form method="POST" action="{{ route('admin.categories.destroy',$category) }}" style="display:inline">@csrf @method('DELETE')
                <button class="btn btn-sm btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection