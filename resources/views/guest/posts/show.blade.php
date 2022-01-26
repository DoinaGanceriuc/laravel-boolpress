@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex p-5">
        <img src="{{ $post->image }}" alt="{{ $post->title }}">
        <div class="details ms-3">
            <h4 class="title">{{ strtoupper($post->title) }}</h4>
            <p>{{ $post->description }}</p>
            <div class="author d-flex justify-content-between">
                <small>Author: {{ $post->author }}</small>
                <small>Posted at: {{ $post->posted_at->format('d/m/Y') }}</small>
            </div>
        </div>
    </div>
    @auth
    <div class="px-5">
        <a class="btn btn-info" href="{{route('admin.posts.index')}}">Back to News</a>
    </div>

    @endauth
</div>

@endsection
