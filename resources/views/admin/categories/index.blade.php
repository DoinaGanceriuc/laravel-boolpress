@extends('layouts.admin')

@section('content')
    @include('partials.errors')
    @include('partials.success')

    <div class="container">
        <h2 class="text-center pb-3">Categorie</h2>
        <div class="row">
            <div class="col-6">
                <form action="{{ route('admin.categories.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                            placeholder="Nome categoria" aria-describedby="nameHelper">
                        <small id="nameHelper" class="text-muted">Nome categoria, max: 255 caratteri</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
            <div class="col-6">
                <ul class="list-group">
                    @foreach ($categories as $category)
                        <li class="list-group-item d-flex align-items-center">
                            <form action="{{ route('admin.categories.update', $category->id) }}" method="post">
                                @csrf
                                @method('PATCH')

                                <input class="border-0" type="text" name="name" id="name"
                                    value="{{ $category->name }}">
                            </form>

                            <a href="{{ route('categories.posts', $category->slug) }}"><span
                                    class="badge rounded-pill bg-success me-3">{{ $category->posts()->count() }}</span></a>

                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#delete{{ $category->id }}">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            <div class="modal fade" id="delete{{ $category->id }}" tabindex="-1"
                                aria-labelledby="modal-{{ $category->id }}Label" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="{{ $category->id }}Label">Stai cercanando di
                                                cancellare la categoria {{ $category->name }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Sei sicuro di voler procedere con l'eliminazione?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <form action="{{ route('admin.categories.destroy', $category->id) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger text-white">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>


@endsection
