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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->integer('order_date')->nullable();
            $table->integer('payment_method_id')->nullable();
            $table->integer('delivery_type_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('user_address_id')->nullable();
            $table->bigInteger('total_product_price')->nullable();
            $table->bigInteger('delivery_price')->nullable();
            $table->bigInteger('service_price')->nullable();
            $table->bigInteger('total_amount')->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }

};
