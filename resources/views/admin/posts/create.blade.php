@extends('layouts.admin')

@section('content')

<div class="container p-5">
    <h2 class="text-center">Aggiungi nuovo post</h2>
    @include('partials.errors')

    <form action="" method="post">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Titolo post</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" aria-describedby="titleHelper" placeholder="Scrivi qui il titolo del post" value="{{old('title')}}">
            @error('title')
             <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea name="description" id="description" rows="3" class="form-control">{{old('description')}}</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Link immagine</label>
            <input type="text" name="image" id="image" class="form-control @error('image') is-invalid @enderror" aria-describedby="imageHelper" placeholder="Incolla il link dell'immagine, es: https://" value="{{old('image')}}">
            @error('image')
             <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Autore</label>
            <input type="text" name="author" id="author" class="form-control" aria-describedby="authorHelper" placeholder="" value="{{old('author')}}">
        </div>
        <div class="mb-3">
            <label for="posted_at" class="form-label">Data di creazione</label>
            <input type="text" name="posted_at" id="posted_at" class="form-control @error('posted_at') is-invalid @enderror" aria-describedby="posted_atHelper" placeholder="Indicare la data nel formato YYYY-MM-DD" value="{{old('posted_at')}}">
            @error('posted_at')
             <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Salva</button>
        <a class="btn btn-warning" href="{{route('admin.posts.index')}}">Annulla</a>
    </form>
</div>

@endsection
