<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('author')->latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function create() { return view('posts.form'); }

    public function store(Request $request)
    {
        $data = $request->validate(['title' => 'required|max:255', 'body' => 'required']);
        $data['slug'] = Str::slug($data['title']) . '-' . Str::random(5);
        $request->user()->posts()->create($data);
        return redirect()->route('posts.index')->with('success', 'Post berhasil dibuat.');
    }

    public function edit(Post $post)
    {
        Gate::authorize('update', $post);
        return view('posts.form', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        Gate::authorize('update', $post);
        $post->update($request->validate(['title' => 'required|max:255', 'body' => 'required']));
        return redirect()->route('posts.index')->with('success', 'Post berhasil diperbarui.');
    }

    public function destroy(Post $post)
    {
        Gate::authorize('delete', $post);
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post berhasil dihapus.');
    }
}