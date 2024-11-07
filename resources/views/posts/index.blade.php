<!-- resources/views/posts/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Posts</h1>

    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create New Post</a>

    @if (count($posts) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Expires At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->description }}</td>
                        <td><img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" width="100"></td>
                        <td>{{ $post->status }}</td>
                        <td>{{ $post->expires_at ? $post->expires_at->format('Y-m-d H:i') : 'No Expiry' }}</td>
                        <td>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No posts found.</p>
    @endif
</div>
@endsection
