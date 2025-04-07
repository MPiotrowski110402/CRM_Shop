<!-- resources/views/orders/transaction_history.blade.php -->

@extends('layout')

@section('content')
    <h2 class="mt-4">Historia zamówień</h2>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Zamknij"></button>
        </div>
    @endif

    <!-- Pole wyszukiwania -->
    <input type="text" id="searchInput" class="form-control mb-3" placeholder="Szukaj zamówienia...">

    @if($orders->isEmpty())
        <p>Brak zamówień.</p>
    @else
        <table class="table" id="ordersTable">
            <thead>
                <tr>
                    <th>Numer zamówienia</th>
                    <th>Data zamówienia</th>
                    <th>Kwota</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr class="order-row">
                        <td class="order-number">{{ $order->order_number }}</td>
                        <td class="order-date">{{ $order->created_at->format('d.m.Y H:i') }}</td>
                        <td class="order-price">{{ $order->total_price }} {{ $order->currency }}</td>
                        <td class="order-status">{{ $order->status }}</td>
                        <td>
                            <form action="/product/{{$order->id}}/finished" method="POST">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-success" type="submit">
                                    <i class="bi bi-box-arrow-up"></i> Oznacz jako Zakończone
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <!-- Skrypt do filtrowania -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("searchInput").addEventListener("keyup", function() {
                let filter = this.value.toLowerCase();
                let rows = document.querySelectorAll("#ordersTable tbody .order-row");

                rows.forEach(row => {
                    let text = row.innerText.toLowerCase();
                    row.style.display = text.includes(filter) ? "" : "none";
                });
            });
        });
    </script>
@endsection
