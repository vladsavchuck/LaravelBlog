<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('welcome', compact('posts'));
    }

    public function store(Request $request)
    {
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('home');  
    }

    public function destroy($id)
    {
        Post::destroy($id);
        return redirect()->route('home');  
    }
}
