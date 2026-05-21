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
        Schema::create('trip_seats', function (Blueprint $table) {
            $table->id();
        // Trip this seat belongs to
            $table->foreignId('trip_id')
                ->constrained()
                ->cascadeOnDelete();

            // Physical seat (A1, A2, B1...)
            $table->foreignId('seat_id')
                ->constrained()
                ->cascadeOnDelete();

            // Booking state
            $table->boolean('is_booked')->default(false);

            // Who booked the seat (after payment)
            $table->foreignId('booked_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamps();

            // Prevent duplicate seats per trip
            $table->unique(['trip_id', 'seat_id']);
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trip_seats');
    }
};
