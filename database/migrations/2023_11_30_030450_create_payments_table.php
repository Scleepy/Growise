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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->dateTime('PaymentDate');
            $table->timestamps();

            $table->unsignedBigInteger('UserID');
            $table->foreign('UserID')->references('id')->on('users');

            $table->unsignedBigInteger('TransactionHeaderID');
            $table->foreign('TransactionHeaderID')->references('id')->on('transaction_headers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
