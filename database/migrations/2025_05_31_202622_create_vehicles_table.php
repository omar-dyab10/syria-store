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
            $table->enum('vehicle_type', ['car', 'bike','motorcycle','bus','truck','van',]);
            $table->string('brand');
            $table->string('model');
            $table->string('series');
            $table->string('version');
            $table->string('year');
            $table->string('mileage')->default(0);
            $table->string('engine_size');
            $table->string('engine_power');
            $table->string('color');
            $table->string('price');
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
