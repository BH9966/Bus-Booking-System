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
        Schema::create('buses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('operator_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->string('bus_number')->unique();
            $table->string('plate_number')->unique();
            $table->string('model')->nullable();
            $table->enum('bus_type', ['normal','luxury','vip']);
            $table->integer('capacity');
            $table->enum('bus_status', ['active','maintenance','inactive'])->default('active');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buses');
    }
};
