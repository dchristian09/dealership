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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->string('model');
            $table->integer('year');
            $table->integer('passengers');
            $table->string('manufacturer');
            $table->decimal('price', 30, 2);
            $table->string('vehicle_type');
            $table->string('fuel_type')->nullable();
            $table->decimal('trunk_area', 10, 2)->nullable();
            $table->integer('tire_count')->nullable();
            $table->decimal('cargo_area', 10, 2)->nullable();
            $table->decimal('luggage_size', 10, 2)->nullable();
            $table->decimal('fuel_capacity', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
