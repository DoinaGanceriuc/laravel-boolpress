@extends('layouts.admin')

@section('content')
    <div class="container p-5">
        <h2 class="text-center">Aggiorna post</h2>
        @include('partials.errors')

        <form action="{{ route('admin.posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Titolo post</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                    aria-describedby="titleHelper" placeholder="Scrivi qui il titolo del post" value="{{ $post->title }}">
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <div class="form-group">
                    <label for="category_id">Categorie</label>
                    <select class="form-control" name="category_id" id="category_id">
                        <option selected disabled>Seleziona una categoria</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $category->id == old('category', $post->category_id) ? 'selected' : '' }}>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <div class="form-group">
                    <label for="tags">Tags</label>
                    <select multiple class="form-control" name="tags[]" id="tags">
                        @if ($tags)
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}" {{ $post->tags->contains($tag) ? 'selected' : '' }}>
                                    {{ $tag->name }}</option>
                            @endforeach
                        @endif
                    </select>
                    @error('tags')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea name="description" id="description" rows="3"
                    class="form-control">{{ $post->description }}</textarea>
            </div>
            <div class="row align-items-center">
                <div class="col-2">
                    <img width="80" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">

                </div>
                <div class="col-10">
                    <div class="mb-3">
                        <label for="image" class="form-label">Aggiorna immagine</label>
                        <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror"
                            aria-describedby="imageHelper" accept="images/*">
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="posted_at" class="form-label">Data di creazione</label>
                <input type="text" name="posted_at" id="posted_at"
                    class="form-control @error('posted_at') is-invalid @enderror" aria-describedby="posted_atHelper"
                    placeholder="Indicare la data nel formato YYYY-MM-DD"
                    value="{{ $post->posted_at->format('Y-m-d') }}">
                @error('posted_at')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Aggiorna</button>
            <a class="btn btn-warning" href="{{ route('admin.posts.index') }}">Annulla</a>
        </form>
    </div>

@endsection
