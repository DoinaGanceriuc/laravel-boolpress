@extends('layouts.app')

@section('content')

    <div class="container p-5">
        <h2 class="text-center pb-5">Contattaci</h2>
        @include('partials.errors')
        @include('partials.success')

        <form action="{{ route('guest.contacts.send') }}" method="post">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                            aria-describedby="nameHelper" placeholder="Scrivi qui il tuo nome" required minlength="3"
                            maxlength="80" value="{{ old('name') }}">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="email" class="form-label">Indirizzo email</label>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is-invalid @enderror" aria-describedby="emailHelper"
                            placeholder="name@example.com" required value="{{ old('email') }}">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="subject" class="form-label">Oggetto</label>
                <input type="text" name="subject" id="subject" class="form-control @error('subject') is-invalid @enderror"
                    aria-describedby="subjectHelper" placeholder="oggetto mail" required minlength="5" maxlength="20"
                    value="{{ old('subject') }}">
                @error('subject')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Messaggio</label>
                <textarea name="message" id="message" rows="3" class="form-control" required
                    minlength="30">{{ old('message') }}</textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Invia</button>
                <a class="btn btn-warning" href="{{ route('guest.posts.index') }}">Annulla</a>
            </div>
        </form>
    </div>

@endsection
