<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }
    public function home()
    {
        $approvedPosts = Post::where('status', 'approved')->get(); 
        return view('homme', compact('approvedPosts')); 
    }
    
    public function create()
    {
        return view('posts.create');
    }

    public function show($id)
    {
        $post = Post::with('comments')->findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image',
            'status' => 'required|string',
            'expires_at' => 'nullable|date',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'status' => $request->status,
            'expires_at' => $request->expires_at,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        
        // Delete the associated image file if it exists
        if ($post->image) {
            Storage::delete($post->image);
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }

    public function storeComment(Request $request, $postId)
    {
        $request->validate([
            'author_name' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Comment::create([
            'post_id' => $postId,
            'author_name' => $request->author_name,
            'content' => $request->content,
        ]);

        return redirect()->route('posts.show', $postId)->with('success', 'Comment added successfully.');
    }
}