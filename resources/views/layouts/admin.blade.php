@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-sm-4">
            <div class="card shadow bg-dark text-white">
                <div class="card-body">
                    <h3 class="card-title text-white"><a href="{{ route('posts.index') }}" class="text-white"> Posts</a></h3>
                    <p class="card-text">{{ $posts }}</p>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card shadow bg-primary text-white">
                <div class="card-body">
                    <h3 class="card-title text-white"><a href="{{ route('comments.index') }}" class="text-white">
                            Comments</a></h3>
                    <p class="card-text">{{ $comments }}</p>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card  shadow bg-danger text-white">
                <div class="card-body">
                    <h3 class="card-title text-white"><a href="{{ route('posts.trash') }}" class="text-white"> Trashed
                            Posts</a></h3>
                    <p class="card-text">{{ $trashedPosts }}</p>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card  shadow bg-warning text-white">
                <div class="card-body">
                    <h3 class="card-title text-white"><a href="{{ route('comments.trash') }}" class="text-white"> Trashed
                            Comments</a></h3>
                    <p class="card-text">{{ $trashedComments }}</p>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card  shadow bg-success text-white">
                <div class="card-body">
                    <h3 class="card-title text-white"><a href="#" class="text-white"> Users</a></h3>
                    <p class="card-text">{{ $users }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
