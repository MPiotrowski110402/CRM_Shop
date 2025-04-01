<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id', 'client_name', 'client_email', 'client_phone',
        'order_number', 'status', 'total_price', 'currency', 'discount',
        'tax', 'shipping_cost', 'payment_method', 'payment_status',
        'shipping_address', 'shipping_postcode', 'shipping_city',
        'shipping_country', 'shipping_type', 'tracking_number',
        'order_notes', 'internal_notes', 'is_gift', 'gift_message',
        'invoice_number', 'invoice_url', 'source', 'referral_code',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
