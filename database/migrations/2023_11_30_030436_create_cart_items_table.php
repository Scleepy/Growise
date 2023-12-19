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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->integer('Quantity');
            $table->string('ItemNotes')->nullable();
            $table->decimal('Subtotal', 10, 2);
            $table->timestamps();

            $table->unsignedBigInteger('CartID');
            $table->foreign('CartID')->references('id')->on('carts');

            $table->unsignedBigInteger('ProductID');
            $table->foreign('ProductID')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
