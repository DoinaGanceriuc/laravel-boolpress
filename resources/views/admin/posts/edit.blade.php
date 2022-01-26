@extends('layouts.admin')

@section('content')
<div class="container p-5">
    <h2 class="text-center">Aggiorna post</h2>
    @include('partials.errors')

    <form action="{{route('admin.posts.update', $post->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Titolo post</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" aria-describedby="titleHelper" placeholder="Scrivi qui il titolo del post" value="{{$post->title}}">
            @error('title')
             <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea name="description" id="description" rows="3" class="form-control">{{$post->description}}</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Link immagine</label>
            <input type="text" name="image" id="image" class="form-control @error('image') is-invalid @enderror" aria-describedby="imageHelper" placeholder="Incolla il link dell'immagine, es: https://" value="{{$post->image}}">
            @error('image')
             <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Autore</label>
            <input type="text" name="author" id="author" class="form-control" aria-describedby="authorHelper" placeholder="" value="{{$post->author}}">
        </div>
        <div class="mb-3">
            <label for="posted_at" class="form-label">Data di creazione</label>
            <input type="text" name="posted_at" id="posted_at" class="form-control @error('posted_at') is-invalid @enderror" aria-describedby="posted_atHelper" placeholder="Indicare la data nel formato YYYY-MM-DD" value="{{$post->posted_at->format('Y-m-d')}}">
            @error('posted_at')
             <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Aggiorna</button>
        <a class="btn btn-warning" href="{{route('admin.posts.index')}}">Annulla</a>
    </form>
</div>

@endsection
