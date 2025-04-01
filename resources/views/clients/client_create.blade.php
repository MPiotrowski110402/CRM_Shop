@extends('layout')

@section('content')
<h1>Dodaj klienta</h1>

<form method="POST" action="{{ route('clients.store') }}">
    @csrf
    <label>Imię i nazwisko:</label>
    <input type="text" name="name" required>

    <label>Email:</label>
    <input type="email" name="email" required>

    <label>Telefon:</label>
    <input type="text" name="phone">

    <button type="submit">Dodaj klienta</button>
</form>
@endsection
