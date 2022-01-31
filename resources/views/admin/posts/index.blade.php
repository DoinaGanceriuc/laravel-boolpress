@extends('layouts.admin')

@section('content')

    @include('partials.success')

    <div class="container">
        <div class="text-end mb-3">
            <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Create</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Posted Date</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td><img width="80" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"></td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->posted_at->format('d/m/Y') }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('guest.posts.show', $post->slug) }}"><i
                                    class="fas fa-eye"></i></a>
                            <a class="btn btn-warning" href="{{ route('admin.posts.edit', $post->id) }}"><i
                                    class="fas fa-pencil-alt"></i></a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#delete{{ $post->id }}">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            <div class="modal fade" id="delete{{ $post->id }}" tabindex="-1"
                                aria-labelledby="modal-{{ $post->id }}Label" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="{{ $post->id }}Label">Stai cercanando di
                                                cancellare il post {{ $post->title }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Sei sicuro di voler procedere con l'eliminazione?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>

@endsection
