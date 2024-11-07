@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" width="300">
        <p>{{ $post->description }}</p>
        <p>Status: {{ $post->status }}</p>
        <p>Expires At: {{ $post->expires_at ? $post->expires_at->format('Y-m-d H:i') : 'No Expiry' }}</p>
        
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to Posts</a>
        
        <!-- Include the comments view -->
        @include('posts.comments', ['post' => $post])
    </div>
@endsection
