<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreignId('cart_id')->references('id')->on( 'carts')->cascadeOnDelete();
            $table->string('billing-name');
            $table->string('billing-email-address');
            $table->string('billing-phone');
            $table->string('billing-address');
            $table->string('billing-country');
            $table->string('billing-city');
            $table->string('billing-zip-code');
            $table->string('shipping-name');
            $table->string('shipping-email-address');
            $table->string('shipping-phone');
            $table->string('shipping-address');
            $table->string('shipping-country');
            $table->string('shipping-city');
            $table->string('shipping-zip-code');
            $table->string('pay-method');
            $table->string('shipping_charges');
            $table->string('tax');
            $table->string('subtotal');
            $table->string('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
