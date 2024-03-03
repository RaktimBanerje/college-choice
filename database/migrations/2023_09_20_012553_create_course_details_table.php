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
        Schema::create('course_details', function (Blueprint $table) {
            $table->id();
            $table->integer('course_id');
            $table->integer('duration');
            $table->longText('overview')->nullable();
            $table->longText('jobs')->nullable();
            $table->longText('syllabus')->nullable();
            $table->longText('skills')->nullable();
            $table->longText('admission')->nullable();
            $table->longText('faqs')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_details');
    }
};
