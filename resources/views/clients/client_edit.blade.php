@extends('layout')

@section('content')
<h1>Edytuj klienta</h1>

<form method="POST" action="{{ route('clients.update', $client->id) }}">
    @csrf
    @method('PUT')

    <label>Imię i nazwisko:</label>
    <input type="text" name="name" value="{{ $client->name }}" required>

    <label>Email:</label>
    <input type="email" name="email" value="{{ $client->email }}" required>

    <label>Telefon:</label>
    <input type="text" name="phone" value="{{ $client->phone }}">

    <button type="submit">Zapisz zmiany</button>
</form>
@endsection
