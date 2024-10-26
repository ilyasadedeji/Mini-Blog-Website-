<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Display a listing of posts
    public function index()
    {
        $latestPost = Post::latest()->first();
        $posts = Post::all();
        return view('posts.index', compact('latestPost', 'posts'));
    }

    // Show the form for creating a new post
    public function create()
    {
        // Passing default values to prevent errors in the create view
        $latestPost = null;  
        $posts = collect();  // Empty collection
        return view('posts.create', compact('latestPost', 'posts'));
    }

    // Store a newly created post in the database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('posts.index');
    }

    // Display a single post by ID
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }
}





