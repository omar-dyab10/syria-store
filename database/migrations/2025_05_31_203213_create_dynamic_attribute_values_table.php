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
        Schema::create('dynamic_attribute_values', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dynamic_attribute_id')->constrained('dynamic_attributes')->cascadeOnDelete();
            $table->unsignedBigInteger('entity_id');
            $table->string('entity_type');
            $table->string('value_en');
            $table->string('value_ar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dynamic_attribute_values');
    }
};
