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
        Schema::create('users_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->nullable(false); // Utilisation d'un entier non signé pour la clé étrangère
            $table->foreign('users_id')->references('id')->on('users');

            $table->foreignId('products_id')->nullable(false); // Utilisation d'un entier non signé pour la clé étrangère
            $table->foreign('products_id')->references('id')->on('products');
            $table->decimal('price', 10, 2);
            $table->decimal('vat', 10, 1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_products');
    }
};
