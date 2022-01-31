@extends('layouts.app')

@section('content')
    <h1 class="text-center">News</h1>
    <div class="d-flex justify-content-between container-fluid">
        <div class="container-fluid w-75">
            <div class="row g-3">
                @foreach ($posts as $post)
                    <div class="col-4">
                        <div class="card">
                            <a href="{{ route('guest.posts.show', $post->slug) }}"><img class="w-100"
                                    src="{{ asset('storage/' . $post->image) }}" class="card-img-top"
                                    alt="{{ $post->title }}"></a>
                            <div class="card-body">
                                <h5 class="card-title">{{ strtoupper($post->title) }} </h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <aside class="bg-light">
            <div class="card px-5 p-3 mb-3">
                <h5 class="card-title text-center">Categories</h5>
                <div class="card-body">
                    <ul class="list-unstyled">
                        @foreach ($categories as $category)
                            <li>
                                <a class="text-decoration-none"
                                    href="{{ route('categories.posts', $category->slug) }}">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="card px-5 p-3 mb-3">
                <h5 class="card-title text-center">Tags</h5>
                <div class="card-body">
                    <ul class="list-unstyled">
                        @foreach ($tags as $tag)
                            <li>
                                <a class="text-decoration-none"
                                    href="{{ route('tags.posts', $tag->slug) }}">{{ $tag->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </aside>
    </div>



@endsection
