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
        //

       Schema::table('seat_locks', function (Blueprint $table) {

    $table->dropColumn('session_id');

    $table->uuid('reservation_token')
        ->after('user_id');

    $table->unique(
        ['trip_id', 'seat_id'],
        'seat_locks_trip_seat_unique'
    );

   });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //

       Schema::table('seat_locks', function (Blueprint $table) {

        // Drop the unique index
        $table->dropUnique('seat_locks_trip_seat_unique');

        // Remove reservation token
        $table->dropColumn('reservation_token');

        // Restore session_id
        $table->string('session_id')
              ->nullable()
              ->after('user_id');

    });
    }
};
