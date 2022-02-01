@component('mail::message')
# Introduction

{{ $contact->message }}

Nome: {{ $contact->name }}
Email: {{ $contact->email }}
Oggetto: {{ $contact->subject }}

@component('mail::button', ['url' => $url])
    Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
