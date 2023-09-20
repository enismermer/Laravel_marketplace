@extends('auth.layout')

<title>Register Success</title>

<style>
    .message-container {
        text-align: center;
        font-size: 1.5em;
    }

    .message-container p:first-child {
        font-size: 2em;
    }

    .message-container p:nth-child(2) strong {
        text-decoration: underline;
    }
</style>

@section('content')
    <div class="message-container">
        <p>Félicitations</p>
        <p>Votre compte a été créé. Un <strong>email</strong> vous a été envoyé.</p>
    </div>
@endsection