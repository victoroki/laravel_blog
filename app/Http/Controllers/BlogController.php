<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class BlogController extends Controller
{
    public function showPendingBlogs()
{
    $pendingBlogs = Post::where('status', 'draft')->get(); 
    return view('admin.pendingBlog', compact('pendingBlogs'));
}

public function approveBlog($id)
{
    $blog = Post::findOrFail($id);
    $blog->status = 'approved';
    $blog->save();

    return redirect()->route('admin.pendingBlogs')->with('success', 'Blog approved successfully!');
}

public function rejectBlog(Request $request, $id)
{
    $blog = Post::findOrFail($id);
    $blog->status = 'rejected';
    $blog->rejection_reason = $request->input('rejection_reason'); // Add this column in your blogs table
    $blog->save();

    return redirect()->route('admin.pendingBlogs')->with('success', 'Blog rejected successfully!');
}

public function show($id)
{
    $blog = Blog::findOrFail($id); 
    return view('posts.show', compact('blog')); 
}


}
