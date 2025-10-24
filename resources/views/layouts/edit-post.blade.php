@section('title', $post->title)
@extends('layouts.main')
@section('content')
    <h3 class="mb-2">Edit Post ({{ substr($post->title, 0, 20) . '...' }})</h3>
    <div class="container mt-2">
        <div class="row">
            <div class="col-sm-12">
                {{-- <x-edit-post-form :post="$post"></x-edit-post-form> --}}
                @include('components.edit-post-form', ['post' => $post])
            </div>
        </div>
    </div>

@endsection
