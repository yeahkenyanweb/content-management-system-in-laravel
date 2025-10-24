<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Comments;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Posts::count();
        $comments = Comments::count();
        $users = User::count();
        $trashedPosts = Posts::onlyTrashed()->count();
        $trashedComments = Comments::onlyTrashed()->count();
        return view('layouts.admin', compact('posts', 'comments', 'users','trashedPosts','trashedComments'));
    }
}
