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
        // Валідція
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('home')->with('success', 'Пост успішно додано!');
    }

    public function destroy($id)
    {
        Post::destroy($id);
        return redirect()->route('home')->with('success', 'Пост успішно видалено!');
    }

  public function edit($id)
{
    $post = Post::findOrFail($id);
    return view('edit', compact('post'));
}

public function update(Request $request, $id)
{
    $post = Post::findOrFail($id);
    $post->update([
        'title' => $request->title,
        'content' => $request->content,
    ]);

    return redirect()->route('home');
}

}
