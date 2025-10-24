@extends('layouts.main')
@section('content')
    <div class="container-fluid mt-0 pt-0">
        @if($post->images->isNotEmpty())
                <div id="postCarousel" class="carousel slide mb-4" data-bs-ride="carousel" style="height: fit-content">
                    <div class="carousel-inner">
                        @foreach($post->images as $key => $image)
                            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                <img src="{{ asset('storage/' . $image->path) }}"
                                     class="d-block w-100 rounded shadow-sm img-fluid h-50"
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
        <div class="card-title mt-2 text-capitalize">{{ $post->title }}</div>
        <div class="card-text">
            {!! $post->body !!}
        </div>
    </div>
@endsection
