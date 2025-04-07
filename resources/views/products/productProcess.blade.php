@extends('layout')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">📦 Panel wysyłki produktu</h2>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Zamknij"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">

            {{-- === DANE KLIENTA === --}}
            <h5 class="mb-3 text-primary border-bottom pb-2">👤 Dane klienta</h5>
            <div class="row row-cols-1 row-cols-md-3">
                <div><strong>Imię i nazwisko:</strong><br>{{ $order->client->name }}</div>
                <div><strong>Email:</strong><br>{{ $order->client->email }}</div>
                <div><strong>Telefon:</strong><br>{{ $order->client->phone }}</div>
            </div>

            {{-- === DANE ZAMÓWIENIA === --}}
            <h5 class="mt-4 mb-3 text-primary border-bottom pb-2">🧾 Dane zamówienia</h5>
            <div class="row row-cols-1 row-cols-md-3">
                <div><strong>Numer zamówienia:</strong><br>{{ $order->order_number }}</div>
                <div><strong>Data zakupu:</strong><br>{{ $order->created_at->format('d.m.Y H:i') }}</div>
                <div><strong>Łączna kwota:</strong><br>{{ $order->total_price }} {{ $order->currency }}</div>
                <div><strong>Metoda płatności:</strong><br>{{ $order->payment_method }}</div>
                <div><strong>Status płatności:</strong><br>{{ $order->payment_status }}</div>
            </div>

            {{-- === ADRES DOSTAWY === --}}
            <h5 class="mt-4 mb-3 text-primary border-bottom pb-2">📮 Adres dostawy</h5>
            <div class="row row-cols-1 row-cols-md-3">
                <div><strong>Ulica:</strong><br>{{ $order->shipping_address }}</div>
                <div><strong>Kod pocztowy:</strong><br>{{ $order->shipping_postcode }}</div>
                <div><strong>Miasto:</strong><br>{{ $order->shipping_city }}</div>
                <div><strong>Kraj:</strong><br>{{ $order->shipping_country }}</div>
            </div>

            {{-- === INFORMACJE O WYSYŁCE === --}}
            <h5 class="mt-4 mb-3 text-primary border-bottom pb-2">🚚 Wysyłka</h5>
            <div class="row row-cols-1 row-cols-md-2">
                <div><strong>Typ wysyłki:</strong><br>{{ $order->shipping_type }}</div>
                <div><strong>Numer śledzenia:</strong><br>{{ $order->tracking_number }}</div>
            </div>

            {{-- === UWAGI === --}}
            <h5 class="mt-4 mb-3 text-primary border-bottom pb-2">📝 Uwagi</h5>
            <div class="mb-2"><strong>Notatka do zamówienia:</strong><br>{{ $order->order_notes ?? 'Brak' }}</div>
            <div><strong>Notatka wewnętrzna:</strong><br>{{ $order->internal_notes ?? 'Brak' }}</div>

            {{-- === PREZENT === --}}
            <h5 class="mt-4 mb-3 text-primary border-bottom pb-2">🎁 Prezent</h5>
            <div><strong>Czy to prezent?:</strong> {{ $order->is_gift ? 'Tak' : 'Nie' }}</div>
            @if($order->is_gift && $order->gift_message)
                <div class="mt-2"><strong>Wiadomość do prezentu:</strong><br>{{ $order->gift_message }}</div>
            @endif

            {{-- === ACTION BUTTONS === --}}
            <div class="d-flex justify-content-between mt-5 pt-3 border-top">
                <a href="/products/{{$order->id}}/print-label" class="btn btn-outline-primary">
                    <i class="bi bi-printer"></i> Drukuj etykietę
                </a>

                <form action="/product/{{$order->id}}/shipped" method="POST">
                    @csrf
                    @method('PATCH')
                    <button class="btn btn-success" type="submit">
                        <i class="bi bi-box-arrow-up"></i> Oznacz jako wysłane
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
