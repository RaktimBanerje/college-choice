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
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->longText('slug')->nullable();
            $table->text('name')->nullable();
            $table->longText('title')->nullable();
            $table->longText('mode')->nullable();
            $table->date('date')->nullable();
            $table->longText('overview')->nullable();
            $table->longText('process')->nullable();
            $table->text('question_papers')->nullable();
            $table->longText('syllabus')->nullable();
            $table->longText('preparation_tips')->nullable();
            $table->longText('cutoff')->nullable();
            $table->longText('news')->nullable();
            $table->longText('colleges')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
