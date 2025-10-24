@extends('layouts.app')
@section('title', 'Blog')
@section('content')

    <!-- Hero Section -->
    <section class="bg-dark text-white text-center py-5">
        <div class="container">
            <h1 class="display-4 fw-bold text-white">Welcome to Our Blog</h1>
            <p class="lead">Insights, updates, and stories from our team</p>
            {{-- login to post --}}
            @auth
                <a class="btn btn-warning" href="{{ route('dashboard') }}" role="button">Go to Dashboard</a>
            @else
                <div class="d-flex justify-content-center gap-2">
                    <a class="btn btn-outline-secondary" href="{{ route('login') }}" role="button">Login to Post</a>
                    <a class="btn btn-outline-success" href="{{ route('register') }}" role="button">Register</a>
                </div>
            @endauth
        </div>
    </section>

    <!-- Blog Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row mb-4">
                <div class="col text-center">
                    <h2 class="fw-bold">Latest Posts</h2>
                    <p class="text-muted">Stay informed with our recent articles</p>
                </div>
            </div>

            <div class="row g-4">
                @foreach ($posts as $blog)
                    <div class="col-md-4">
                        <div class="card shadow-sm border-0 h-100">
                            @if ($blog->images->isNotEmpty())
                                <!-- Display the first image of the post -->
                                <img src="{{ asset('storage/' . $blog->images->first()->path) }}" class="card-img-top"
                                    alt="{{ $blog->title }}">
                            @else
                                <!-- Fallback image if no image is attached -->
                                <img src="https://images.pexels.com/photos/1148820/pexels-photo-1148820.jpeg"
                                    class="card-img-top" alt="Default Blog Image">
                            @endif

                            <div class="card-body">
                                <h5 class="card-title fw-bold">{{ $blog->title }}</h5>
                                <p class="card-text text-muted">
                                    {!! \Illuminate\Support\Str::words(strip_tags($blog->body), 15, '...') !!}
                                </p>
                                <a href="{{ route('blogs.show', $blog->slug) }}" class="btn btn-dark btn-sm">Read More</a>
                            </div>
                            <div class="card-footer bg-white border-0">
                                <small class="text-muted">
                                    <i class="fa fa-calendar"></i> {{ $blog->created_at->diffForHumans() }} | by
                                    {{ $blog->user->name ?? 'Admin' }}
                                </small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


            <!-- Pagination -->
            <div class="row mt-5">
                <div class="col text-center">
                    <div class="d-flex justify-content-center mt-4">
                        {{ $posts->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="text-center py-5 bg-dark text-white">
        <div class="container">
            <h3 class="fw-bold mb-3">Want to stay updated?</h3>
            <p class="mb-4">Subscribe to our newsletter and never miss a post.</p>
            <form class="d-flex justify-content-center">
                <input type="email" class="form-control w-50 me-2" placeholder="Enter your email">
                <button class="btn btn-danger" type="submit">Subscribe</button>
            </form>
        </div>
    </section>
@endsection
