@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="name">Name: {{ strtoupper($contact->name) }}</h3>
                <h6>From: {{ $contact->email }}</h6>
                <div class="d-flex justify-content-between pt-3">
                    <h6>Subject: {{ $contact->subject }}</h6>
                    <h6>Created at: {{ $contact->created_at->format('d/m/Y') }}</h6>
                </div>
            </div>
            <div class="card-body">
                <p>{{ $contact->message }}</p>
            </div>
        </div>
        <div class="back_messages pt-3 text-center">
            <a class="btn btn-primary" href="{{ route('admin.contacts.index') }}">Back Messages</a>
        </div>
    </div>

@endsection
