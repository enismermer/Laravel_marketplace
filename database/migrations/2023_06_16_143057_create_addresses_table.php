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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('address_line1', 100)->nullable(false);
            $table->string('address_line2', 100)->nullable(false);
            $table->string('city', 50)->nullable(false);
            $table->string('postal_code', 10)->nullable(false);
            $table->string('country', 50)->nullable(false);
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
