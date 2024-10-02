<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all(); // Отримання всіх постів
        return view('welcome', compact('posts')); // Повернення до welcome з постами
    }

public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
    ]);

    Post::create([
        'title' => $request->title,
        'content' => $request->content,
        // 'user_id' => null, // Цей рядок більше не потрібен
    ]);

    return redirect()->route('posts.index');
}

}
