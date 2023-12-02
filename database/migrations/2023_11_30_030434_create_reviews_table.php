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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->integer('Rating');
            $table->string('Comment');
            $table->dateTime('ReviewDate');
            $table->timestamps();

            $table->unsignedBigInteger('UserID');
            $table->foreign('UserID')->references('id')->on('users');

            $table->unsignedBigInteger('ProductID');
            $table->foreign('ProductID')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
