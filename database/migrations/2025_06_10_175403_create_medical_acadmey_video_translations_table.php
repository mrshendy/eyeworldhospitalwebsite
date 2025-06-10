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
        Schema::create('medical_acadmey_video_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medical_acadmey_video_id');
            $table->foreign('medical_acadmey_video_id', 'ma_vid_trans_fk')->references('id')->on('medical_acadmey_videos')->onDelete('cascade');
            $table->string('locale')->index();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->unique(['medical_acadmey_video_id', 'locale'], 'ma_video_translations_unique');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_acadmey_video_translations');
    }
};
