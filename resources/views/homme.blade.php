@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3 class="text-center">Blogs</h3>

    @if($approvedPosts->isEmpty())
        <div class="alert alert-info text-center">No approved posts available at the moment.</div>
    @else
        <div class="row">
            @foreach($approvedPosts as $post)
                <div class="col-md-4 mb-4"> <!-- Responsive column for Bootstrap -->
                    <div class="card h-100"> <!-- Card with full height -->
                        <img src="{{ $post->image_url }}" class="card-img-top" alt="{{ $post->title }}"> <!-- Optional Image -->
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ Str::limit($post->content, 100) }}</p> <!-- Shorten content -->
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Read More</a> <!-- Link to detailed view -->
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
