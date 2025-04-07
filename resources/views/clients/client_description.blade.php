@extends('layout')

@section('content')
<!-- client_description.blade.php -->
<div class="container">
    <h2>{{ $client->name }} - Szczegóły</h2>
    
    <!-- Zakładki -->
    <ul class="nav nav-tabs" id="clientTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="details-tab" data-bs-toggle="tab" href="#details" role="tab" aria-controls="details" aria-selected="true">Szczegóły</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="history-tab" data-bs-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="false">Historia Zakupów</a>
        </li>
    </ul>
    
    <!-- Treść Zakładek -->
    <div class="tab-content" id="clientTabContent">
        <!-- Szczegóły klienta -->
        <div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="details-tab">
            <p>E-mail: {{ $client->email }}</p>
            <p>Telefon: {{ $client->phone }}</p>
            <!-- Możesz dodać więcej informacji o kliencie tutaj -->
        </div>

        <!-- Historia zakupów -->
        <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
            <h3>Historia Zakupów</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Numer Zamówienia</th>
                        <th>Data</th>
                        <th>Kwota</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($client->orders as $order)
                        <tr>
                            <td>{{ $order->order_number }}</td>
                            <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                            <td>{{ $order->total_price }} {{ $order->currency }}</td>
                            <td>{{ $order->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@endsection
