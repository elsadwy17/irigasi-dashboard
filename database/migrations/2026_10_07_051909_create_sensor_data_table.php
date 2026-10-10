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
        Schema::create('sensor_data', function (Blueprint $table) {
            $table->id();
            // Data sensor
            $table->unsignedTinyInteger('soil')->nullable();
            $table->decimal('temperature', 5, 2)->nullable();
            $table->decimal('humidity', 5, 2)->nullable();
            $table->decimal('pressure', 8, 2)->nullable();
            // Data drum dan aliran air
            $table->decimal('water_distance', 6, 2)->nullable();
            $table->decimal('flow_rate', 6, 2)->nullable();
            // Status aktuator
            $table->boolean('solenoid_refill')->default(false);
            $table->boolean('solenoid_irrigation')->default(false);
            // Mode sistem
            $table->boolean('automatic_mode')->default(true);
            // Kondisi sistem
            $table->boolean('abnormal_condition')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sensor_data');
    }
};
