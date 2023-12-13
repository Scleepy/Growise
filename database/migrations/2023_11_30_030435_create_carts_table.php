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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->decimal('TotalAmount', 10, 2);
            $table->timestamps();

            $table->unsignedBigInteger('UserID');
            $table->foreign('UserID')->references('id')->on('users');

            $table->unsignedBigInteger('PromoID')->nullable();
            $table->foreign('PromoID')->references('id')->on('promos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
