<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class CommentController extends Controller
{
    public function store(Request $request, $postId)
{
    $request->validate([
        'content' => 'required|string|max:500',
    ]);

    $post = Post::findOrFail($postId);
    
    $comment = new Comment();
    $comment->content = $request->content;
    $comment->author_name = Auth::user()->name; // Automatically set the author's name
    $comment->post_id = $post->id; // Assuming you have a post_id column in the comments table
    $comment->save();

    return redirect()->route('posts.show', $postId)->with('success', 'Comment added successfully!');
}

}
