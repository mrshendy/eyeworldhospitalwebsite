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
        Schema::create('medical_acadmey_videos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('medical_academy_id')->constrained('medical_academies')->onDelete('cascade');
            $table->string('img');
            $table->text('video_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_acadmey_videos');
    }
};
