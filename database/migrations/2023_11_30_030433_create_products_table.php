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
            $table->string('Slug');
            $table->longText('Description');
            $table->longText('ITE');
            $table->decimal('Price', 10, 2);
            $table->integer('StockQuantity');
            $table->string('ProductImage');
            $table->json('GalleryImages');
            $table->timestamps();
            $table->softDeletes();

            $table->unsignedBigInteger('PromoID')->nullable();

            $table->foreign('PromoID')->references('id')->on('promos')->onDelete('set null');


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
