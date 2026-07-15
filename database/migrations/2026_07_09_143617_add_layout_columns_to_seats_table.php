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
        Schema::table('seats', function (Blueprint $table) {

            $table->string('row_letter', 5)->after('seat_number');

            $table->unsignedTinyInteger('seat_position')->after('row_letter');

            $table->enum('seat_side', ['left', 'right'])->after('seat_position');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('seats', function (Blueprint $table) {

            $table->dropColumn([
                'row_letter',
                'seat_position',
                'seat_side',
            ]);

        });
    }
};
