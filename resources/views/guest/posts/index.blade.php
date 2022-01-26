@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row g-3">
        <h1 class="text-center">News</h1>
        @foreach ($posts as $post)
        <div class="col-4">
            <div class="card h-100">
                <a href="{{route('guest.posts.show', $post->id)}}"><img src="{{ $post->image }}" class="card-img-top" alt="{{ $post->title }}"></a>
                <div class="card-body">
                    <h5 class="card-title">{{ strtoupper($post->title) }} </h5>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
