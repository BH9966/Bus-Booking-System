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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->enum('payment_method', ['cash','mobile','card']);

            $table->string('provider_name')->nullable();

            $table->string('phone_number')->nullable();

            $table->string('transaction_ref')->nullable();
            $table->decimal('amount', 10, 2);
            $table->string('currency')->default('TZS');
            $table->enum('status', ['pending','success','failed'])->default('pending');
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
