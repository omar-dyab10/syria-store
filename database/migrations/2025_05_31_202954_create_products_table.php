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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_type');
            $table->string('name_en');
            $table->string('name_ar');
            $table->string('brand');
            $table->string('year');
            $table->enum('status',['available','reserved','sold']);
            $table->enum('warranty',['yes','no']);
            $table->string("warranty_duration")->default('0'); // in months
            $table->string('price');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
