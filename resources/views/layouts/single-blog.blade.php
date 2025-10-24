@extends('layouts.app')

@section('title', $blog->title)

@section('content')
    <section class="py-5">
        <div class="container">
            <!-- Post Title -->
            <h1 class="fw-bold mb-3">{{ $blog->title }}</h1>
            <p class="text-muted">
                <i class="fa fa-user"></i> {{ $blog->user->name ?? 'Admin' }} |
                <i class="fa fa-calendar"></i> {{ $blog->created_at->diffForHumans() }}
            </p>

            <!-- Post Images -->
            @if($blog->images->isNotEmpty())
                <div id="postCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($blog->images as $key => $image)
                            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                <img src="{{ asset('storage/' . $image->path) }}"
                                     class="d-block w-100 rounded shadow-sm"
                                     alt="Post Image">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#postCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#postCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            @endif

            <!-- Post Body -->
            <div class="mb-5">
                <p class="fs-5">{!! $blog->body !!}</p>
            </div>

            <!-- Comments Section -->
            <div class="mt-5">
                <h4 class="fw-bold mb-3"><i class="fa fa-comments"></i> Comments ({{ $blog->comments->count() }})</h4>

                @forelse($blog->comments as $comment)
                    <div class="card border-0 shadow-sm mb-3">
                        <div class="card-body">
                            <strong>{{ $comment->user->name ?? 'Anonymous' }}</strong>
                            <p class="mb-1 text-muted small">{{ $comment->created_at->diffForHumans() }}</p>
                            <p class="border-left">{{ $comment->body }}</p>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">No comments yet. Be the first to comment!</p>
                @endforelse

                <!-- Add Comment Form -->
                <div class="card mt-4 shadow-sm">
                    <div class="card-body">
                        <form action="{{ route('comments.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="commentable_id" value="{{ $blog->id }}">
                            <input type="hidden" name="commentable_type" value="App\Models\Posts">
                            <input type="hidden" name="post_id" value="{{ $blog->id }}">
                            <div class="mb-3">
                                <textarea name="body" class="form-control" rows="3" placeholder="Write a comment..." required></textarea>
                            </div>
                            <button type="submit" class="btn btn-dark btn-sm">
                                <i class="fa fa-paper-plane"></i> Post Comment
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
