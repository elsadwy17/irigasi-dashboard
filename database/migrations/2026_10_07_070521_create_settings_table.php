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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();

            $table->unsignedTinyInteger('soil_threshold')
                ->default(80);
            $table->decimal('refill_distance', 6, 2)
                ->default(40);
            $table->unsignedBigInteger('abnormal_timeout')
                ->default(60);
            $table->boolean('automatic_mode')
                ->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
