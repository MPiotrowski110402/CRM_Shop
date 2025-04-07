<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etykieta Wysyłkowa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>

        .label-container {
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }


        .barcode img {
            width: 250px;
            height: auto;
        }


        .label-header {
            font-size: 1.8rem;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        .details-section label {
            font-weight: bold;
            color: #333;
        }

        .details-section {
            margin-bottom: 10px;
        }

        .footer {
            font-size: 12px;
            color: #888;
            text-align: center;
            margin-top: 20px;
        }


        @media print {
            body, .label-container {
                width: 210mm;
                height: 148mm;
            }

            .footer {
                display: none;
            }
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="label-container">
        <div class="label-header">
            Etykieta Wysyłkowa
        </div>

        <div class="row mb-3">
            <div class="col-12">
                <div class="details-section">
                    <label>Numer Zamówienia:</label> <span>{{ $order->order_number }}</span>
                </div>
                <div class="details-section">
                    <label>Imię i Nazwisko:</label> <span>{{ $order->client->name }}</span>
                </div>
                <div class="details-section">
                    <label>Email:</label> <span>{{ $order->client->email }}</span>
                </div>
                <div class="details-section">
                    <label>Telefon:</label> <span>{{ $order->client->phone }}</span>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12">
                <div class="details-section">
                    <label>Adres Dostawy:</label> <span>{{ $order->shipping_address }}, {{ $order->shipping_postcode }} {{ $order->shipping_city }}, {{ $order->shipping_country }}</span>
                </div>
                <div class="details-section">
                    <label>Typ Wysyłki:</label> <span>{{ $order->shipping_type }}</span>
                </div>
                <div class="details-section">
                    <label>Status Płatności:</label> <span>{{ $order->payment_status }}</span>
                </div>
            </div>
        </div>

        <div class="barcode mb-3">

            <img src="data:image/png;base64,{{ $barcodeBase64 }}" alt="Kod kreskowy" />
        </div>

        <div class="footer">
            <small>Wygenerowano przez system CRM</small>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>

    window.onload = function() {
        window.print();
        

        window.onafterprint = function() {
            window.history.back();  
        };
    };
</script>

</body>
</html>
