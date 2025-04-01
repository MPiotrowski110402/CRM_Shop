<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Client;

class OrderSeeder extends Seeder
{
    public function run()
    {
        $clients = Client::all(); 

        foreach ($clients as $client) {
            Order::create([
                'client_id' => $client->id,
                'client_name' => $client->name,
                'client_email' => $client->email,
                'client_phone' => $client->phone,
                'order_number' => 'ORD-' . rand(1000, 9999),
                'status' => 'Nowe',
                'total_price' => rand(100, 2000),
                'currency' => 'PLN',
                'discount' => rand(0, 50),
                'tax' => 23,
                'shipping_cost' => 15,
                'payment_method' => 'Karta',
                'payment_status' => 'Opłacone',
                'shipping_address' => 'ul. Testowa 123',
                'shipping_postcode' => '00-001',
                'shipping_city' => 'Warszawa',
                'shipping_country' => 'Polska',
                'shipping_type' => 'Kurier',
                'tracking_number' => 'TRK-' . rand(1000, 9999),
                'order_notes' => 'Brak uwag',
                'internal_notes' => 'Ważny klient',
                'is_gift' => false,
                'gift_message' => null,
                'invoice_number' => 'INV-' . rand(1000, 9999),
                'invoice_url' => null,
                'source' => 'Google Ads',
                'referral_code' => null,
            ]);
        }
    }
}
