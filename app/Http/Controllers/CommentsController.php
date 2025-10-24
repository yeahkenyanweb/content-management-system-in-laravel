<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Http\Requests\StoreCommentsRequest;
use App\Http\Requests\UpdateCommentsRequest;
use App\Models\Posts;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comments::all();
        return view('layouts.comments', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required|string|max:1000',
            'commentable_id' => 'required|integer',
            'commentable_type' => 'required|string',
        ]);

        Comments::create([
            'body' => $request->body,
            'commentable_type' => $request->commentable_type,
            'commentable_id' => $request->commentable_id,
        ]);

        return back()->with('success', 'Comment added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comments $comments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comments $comments)
    {
        //
    }
    public function trash()
    {
        $trashedComments = Comments::onlyTrashed()->get();

        return view('layouts.trashed-comments', compact('trashedComments'));
    }
    public function forceDelete($id)
    {
        $comment = Comments::onlyTrashed()->findOrFail($id);
        $comment->forceDelete();
        return redirect()->route('comments.trash')->with('success', 'Comment permanently deleted.');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentsRequest $request, Comments $comments)
    {
        //
    }
public function restore($id)   {
        $comment = Comments::onlyTrashed()->findOrFail($id);
        $comment->restore();
        return redirect()->route('comments.trash')->with('success', 'Comment successfully restored.');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comments $comment)
    {
        $comment->delete();
        return redirect()->route('comments.index')->with('success', 'Comment deleted successfully.');
    }
}
