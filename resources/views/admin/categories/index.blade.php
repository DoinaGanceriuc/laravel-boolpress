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
                        <li class="list-group-item">
                            <form action="{{ route('admin.categories.update', $category->id) }}" method="post">
                                @csrf
                                @method('PATCH')

                                <input class="border-0" type="text" name="name" id="name"
                                    value="{{ $category->name }}">
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>


@endsection
