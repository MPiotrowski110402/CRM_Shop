@extends('layout')

@section('content')
    <h2 class="mt-4">Komunikacja z klientami</h2>

    <div class="filters mb-4">
        <!-- Filtruj według kanału komunikacji -->
        <div class="form-group">
            <label for="channel">Kanał komunikacji</label>
            <select id="channel" class="form-control">
                <option value="">Wszystkie</option>
                <option value="email">E-mail</option>
                <option value="phone">Telefon</option>
                <option value="chat">Czat</option>
                <option value="social_media">Media społecznościowe</option>
            </select>
        </div>

        <!-- Filtruj według typu komunikacji -->
        <div class="form-group">
            <label for="type">Typ komunikacji</label>
            <select id="type" class="form-control">
                <option value="">Wszystkie</option>
                <option value="general_inquiry">Zapytanie ogólne</option>
                <option value="customer_service">Obsługa klienta</option>
                <option value="complaint">Reklamacja</option>
                <option value="promotion">Promocje</option>
            </select>
        </div>

        <!-- Filtruj według statusu komunikacji -->
        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" class="form-control">
                <option value="">Wszystkie</option>
                <option value="responded">Odpowiedziano</option>
                <option value="in_progress">W trakcie</option>
                <option value="unanswered">Nie odpowiedziano</option>
                <option value="closed">Zamknięte</option>
            </select>
        </div>

        <button id="filterBtn" class="btn btn-primary">Filtruj</button>
    </div>

    <!-- Lista komunikacji -->
    <h3>Historia komunikacji</h3>

    <table class="table" id="communicationTable">
        <thead>
            <tr>
                <th>Numer klienta</th>
                <th>Typ komunikacji</th>
                <th>Kanał</th>
                <th>Status</th>
                <th>Data kontaktu</th>
                <th>Ostatnia wiadomość</th>
            </tr>
        </thead>
        <tbody>
            <!-- Dynamiczne wstawianie danych -->
            
                <tr>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>5</td>
                    <td>6</td>
                </tr>

        </tbody>
    </table>

    <div class="pagination">

    </div>

    <script>
        document.getElementById('filterBtn').addEventListener('click', function() {
            const channel = document.getElementById('channel').value;
            const type = document.getElementById('type').value;
            const status = document.getElementById('status').value;

            // Wysyłamy dane filtrów do kontrolera (AJAX lub przekierowanie na nowy URL)
            let url = '/communication?channel=' + channel + '&type=' + type + '&status=' + status;
            window.location.href = url;
        });
    </script>
@endsection
