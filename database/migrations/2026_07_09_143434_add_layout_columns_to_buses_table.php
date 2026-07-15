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
        Schema::table('buses', function (Blueprint $table) {

            $table->unsignedTinyInteger('left_seats')->after('bus_type');

            $table->unsignedTinyInteger('right_seats')->after('left_seats');

            $table->unsignedTinyInteger('total_rows')->after('right_seats');

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('buses', function (Blueprint $table) {

            $table->dropColumn([
                'left_seats',
                'right_seats',
                'total_rows',
            ]);

        });
    }
};
