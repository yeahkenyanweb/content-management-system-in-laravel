@extends('layouts.app')

@section('title', 'Page Not Found')

@section('content')
    <div class="d-flex flex-column align-items-center justify-content-center" style="height: 80vh; text-align: center;">
        <div>
            <i class="bi bi-exclamation-triangle-fill text-danger" style="font-size: 5rem;"></i>
            <h1 class="mt-3 fw-bold" style="font-size: 3rem;">404</h1>
            <h3 class="text-muted mb-3">Oops! The page you’re looking for doesn’t exist.</h3>
            <p class="mb-4">
                It seems we can’t find the page you were trying to reach.<br>
                It might have been moved, renamed, or deleted.
            </p>
            <a href="{{ url('/') }}" class="btn btn-danger btn-lg">
                <i class="bi bi-house-door-fill me-2"></i>Back to Home
            </a>
        </div>
    </div>
@endsection
