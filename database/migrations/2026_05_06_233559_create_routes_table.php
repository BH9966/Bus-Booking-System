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
        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('from_station_id')
                ->constrained('locations')
                ->cascadeOnDelete();
            $table->foreignId('to_station_id')
                ->constrained('locations')
                ->cascadeOnDelete();
            $table->decimal('distance_km', 10, 2);
            $table->string('estimated_duration')->nullable();
            $table->enum('status', ['active','inactive'])->default('active');
             $table->foreignId('created_by')
              ->constrained('users')
              ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('routes');
    }
};
