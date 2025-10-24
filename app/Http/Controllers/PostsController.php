<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Posts::all();
        return view('layouts.posts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.create-post');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'body'  => 'required|string',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Create post
        $post = Posts::create([
            'user_id' => $validated['user_id'],
            'title'   => $validated['title'],
            'body'    => $validated['body'],
            'slug'    => str_replace(" ", "-", trim(strtolower($validated['title']))),
        ]);

        // Handle multiple images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                $path = $imageFile->store('uploads/posts', 'public');
                $post->images()->create(['path' => $path]);
            }
        }

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Posts $post)
    {
        return view('layouts.post', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Posts $post)
    {
        return view('layouts.edit-post', compact('post'));
    }

    public function trash()
    {
        $trashedPosts = Posts::onlyTrashed()->get();

        return view('layouts.trashed-posts', compact('trashedPosts'));
    }

    public function restore($id)
    {
        $post = Posts::onlyTrashed()->findOrFail($id);
        $post->restore();
        return redirect()->route('posts.trash')->with('success', 'Post restored successfully.');
    }

    public function forceDelete($id)
    {
        $post = Posts::onlyTrashed()->findOrFail($id);
        $post->forceDelete();
        return redirect()->route('posts.trash')->with('success', 'Post permanently deleted.');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Posts $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $post->update($validated);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Posts $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
