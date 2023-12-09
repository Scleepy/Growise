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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('ProductName');
            $table->string('Description');
            $table->string('ITE');
            $table->decimal('Price', 10, 2);
            $table->integer('StockQuantity');
            $table->string('ProductImage');
            $table->json('GalleryImages');
            $table->timestamps();

            $table->unsignedBigInteger('PromoID');
            $table->foreign('PromoID')->references('id')->on('promos');

            $table->unsignedBigInteger('CategoryID');
            $table->foreign('CategoryID')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
