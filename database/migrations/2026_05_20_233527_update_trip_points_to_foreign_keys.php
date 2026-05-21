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
    Schema::table('trips', function (Blueprint $table) {

        if (Schema::hasColumn('trips', 'boarding_point')) {
            $table->dropColumn('boarding_point');
        }

        if (Schema::hasColumn('trips', 'dropping_point')) {
            $table->dropColumn('dropping_point');
        }

        $table->foreignId('boarding_point_id')
            ->nullable()
            ->constrained('locations')
            ->nullOnDelete();

        $table->foreignId('dropping_point_id')
            ->nullable()
            ->constrained('locations')
            ->nullOnDelete();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('trips', function (Blueprint $table) {

        $table->dropForeign(['boarding_point_id']);
        $table->dropForeign(['dropping_point_id']);

        $table->dropColumn(['boarding_point_id', 'dropping_point_id']);

        $table->string('boarding_point')->nullable();
        $table->string('dropping_point')->nullable();
    });
}
};
