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
        Schema::create('orders_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('orders_id')->nullable(false); // Utilisation d'un entier non signé pour la clé étrangère
            $table->foreign('orders_id')->references('id')->on('orders');

            $table->foreignId('products_id')->nullable(false); // Utilisation d'un entier non signé pour la clé étrangère
            $table->foreign('products_id')->references('id')->on('products');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders_products');
    }
};
