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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')
            ->constrained()
            ->cascadeOnDelete();

            $table->foreignId('passenger_id')
                ->constrained('passengers')
                ->cascadeOnDelete();

            $table->foreignId('seat_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('ticket_number')->unique();
            $table->string('qr_code')->nullable();
            $table->enum('ticket_status', ['valid','used','cancelled'])->default('valid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
