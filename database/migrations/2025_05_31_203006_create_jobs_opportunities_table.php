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
        Schema::create('Job_opportunities', function (Blueprint $table) {
            $table->id();
            $table->string('job_title');
            $table->string('job_type');
            $table->string('experience_level');
            $table->string('salary');
            $table->json('required_skills');
            $table->string('company');
            $table->date('deadline');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
