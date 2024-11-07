<h3>Comments</h3>

@foreach ($post->comments as $comment)
    <div class="border p-3 mb-3">
        <strong>{{ $comment->author_name }}</strong>
        <p>{{ $comment->content }}</p>
    </div>
@endforeach

<form action="{{ route('posts.comments.store', $post->id) }}" method="POST" class="mb-3">
    @csrf
    <textarea name="content" placeholder="Your Comment" required class="form-control mb-2"></textarea>
    <button type="submit" class="btn btn-primary">Add Comment</button>
</form>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
