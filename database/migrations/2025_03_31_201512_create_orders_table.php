<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');
            $table->string('order_number')->unique();
            $table->string('status')->default('Nowe');
            $table->decimal('total_price', 10, 2);
            $table->string('currency')->default('PLN');
            $table->decimal('discount', 5, 2)->nullable();
            $table->decimal('tax', 5, 2)->default(23);
            $table->decimal('shipping_cost', 8, 2)->default(15);
            $table->string('payment_method')->default('Karta');
            $table->string('payment_status')->default('Opłacone');
            $table->text('shipping_address');
            $table->string('shipping_postcode');
            $table->string('shipping_city');
            $table->string('shipping_country')->default('Polska');
            $table->string('tracking_number')->nullable();
            $table->text('order_notes')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
