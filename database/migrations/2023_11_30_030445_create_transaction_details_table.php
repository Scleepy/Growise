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
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->id();
            $table->integer('Quantity');
            $table->decimal('Subtotal', 10, 2);
            $table->timestamps();

            $table->unsignedBigInteger('TransactionHeaderID');
            $table->foreign('TransactionHeaderID')->references('id')->on('transaction_headers');

            $table->unsignedBigInteger('ProductID');
            $table->foreign('ProductID')->references('id')->on('products');

            $table->unsignedBigInteger('PromoID')->nullable();
            $table->foreign('PromoID')->references('id')->on('promos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_details');
    }
};
