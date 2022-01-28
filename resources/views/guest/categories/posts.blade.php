@extends('layouts.app')

@section('content')

    <div class="container">
        <h2 class="text-center pb-3">Categoria: {{ $category->name }}</h2>
        <div class="row">
            @forelse($posts as $post)
                <div class="col-4">
                    <div class="card">
                        <img class="card-img-top" src="{{ $post->cover }}" alt="">
                        <div class="card-body">
                            <h4 class="card-title">{{ $post->title }}</h4>
                            <p class="card-text">{{ $post->sub_title }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col">
                    <p>Nessun post associato ad una categoria</p>
                </div>
            @endforelse

        </div>
    </div>


    <div class="container">
        {{ $posts->links() }}
    </div>

@endsection
