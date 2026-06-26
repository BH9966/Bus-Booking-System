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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bus_id')
            ->constrained()
            ->cascadeOnDelete();
            $table->foreignId('route_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('trip_code')->unique();
            $table->date('departure_date');
            $table->time('departure_time');
            $table->time('arrival_time');
            $table->string('boarding_point')->nullable();
            $table->string('dropping_point')->nullable();

            $table->integer('available_seats')->default(0);
            $table->decimal('price', 10, 2);
            $table->enum('status', ['scheduled','cancelled','completed'])->default('scheduled');
            $table->enum('bus_status', ['waiting','boarding','departed','arrived','delayed'])->default('waiting');
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
        Schema::table('trips', function (Blueprint $table) {
     
        $table->dropForeign(['company_id']); 
        
     
        $table->dropColumn('company_id');
    });
    }
};
