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
        Schema::create('transaction_headers', function (Blueprint $table) {
            $table->id();
            $table->dateTime('TransactionDate');
            $table->decimal('TotalAmount', 10, 2);
            $table->timestamps();

            $table->unsignedBigInteger('UserID');
            $table->foreign('UserID')->references('id')->on('users');

            $table->unsignedBigInteger('ShipmentStatusID');
            $table->foreign('ShipmentStatusID')->references('id')->on('shipment_statuses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_headers');
    }
};
