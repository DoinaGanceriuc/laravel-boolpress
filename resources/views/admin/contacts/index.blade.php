@extends('layouts.admin')

@section('content')

    @include('partials.success')

    <div class="container">
        <h1 class="text-center pb-3">All messages</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($messages as $message)
                    <tr>
                        <th scope="row">{{ $message->id }}</th>
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->subject }}</td>
                        <td>{{ $message->created_at->format('d/m/Y') }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('admin.contacts.show', $message->id) }}"><i
                                    class="fas fa-eye"></i></a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#delete{{ $message->id }}">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            <div class="modal fade" id="delete{{ $message->id }}" tabindex="-1"
                                aria-labelledby="modal-{{ $message->id }}Label" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="{{ $message->id }}Label">Stai cercanando di
                                                cancellare il message: {{ $message->subject }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Sei sicuro di voler procedere con l'eliminazione?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <form action="{{ route('admin.contacts.destroy', $message->id) }}"
                                                method="message">
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
            {{ $messages->links() }}
        </div>
    </div>

@endsection
