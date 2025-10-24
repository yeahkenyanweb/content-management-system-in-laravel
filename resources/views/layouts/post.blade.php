@extends('layouts.main')
@section('content')
    <div class="container-fluid mt-0 pt-0">
        @if($post->images->isNotEmpty())
                <div id="postCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($post->images as $key => $image)
                            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                <img src="{{ asset('storage/' . $imag