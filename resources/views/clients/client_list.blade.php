@extends('layout')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Lista klientów</h1>

    <form method="GET" action="{{ route('clients.index') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Wyszukaj klienta..." value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">Szukaj</button>
        </div>
    </form>

    <a href="{{ route('clients.create') }}" class="btn btn-primary mb-3">Dodaj nowego klienta</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr> 
                <th></th>
                <th>Imię i nazwisko</th>
                <th>Email</th>
                <th>Telefon</th>
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
            <tr>
                <td>
                    <input type="checkbox" name="selected_clients[]" value="{{ $client->id }}" class="client-checkbox">
                </td>
                <td>{{ $client->name }}</td>
                <td>{{ $client->email }}</td>
                <td>{{ $client->phone }}</td>
                <td class="actions">
                    <a href="{{ route('clients.client_edit', $client->id) }}" class="btn btn-warning btn-sm">Edytuj</a>

                    <form method="POST" action="{{ route('clients.destroy', $client->id) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Usuń</button>
                        <a href="{{ route('client_description', $client->id) }}" class="btn btn-info btn-sm">Szczegóły</a>

                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-4">
        {{ $clients->links('pagination::bootstrap-4') }}
    </div>



</div>
@endsection
