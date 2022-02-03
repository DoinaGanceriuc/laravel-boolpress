@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex p-5">
            <img class="img-fluid w-50" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
            <div class="details ms-3">
                <h4 class="title">{{ strtoupper($post->title) }}</h4>
                @if ($post->category)
                    <a href="{{ route('categories.posts', $post->category->slug) }}"><small>Category:
                            {{ $post->category->name }} </small></a>
                @else
                    <small>Nessuna categoria associata</small>

                @endif

                <p>{{ $post->description }}</p>
                <div class="d-flex justify-content-between">
                    <div class="tags">
                        @forelse ($post->tags as $tag)
                            <a href="{{ route('tags.posts', $tag->slug) }}"><small>Tag: {{ $tag->name }}</small></a>
                        @empty
                            <small>Nessun tag assegnato</small>

                        @endforelse
                    </div>
                    <small>Posted at: {{ $post->posted_at->format('d/m/Y') }}</small>
                </div>
            </div>
        </div>
        @auth
            <div class="px-5">
                <a class="btn btn-info" href="{{ route('admin.posts.index') }}">Back to News</a>
            </div>

        @endauth
    </div>

@endsection
