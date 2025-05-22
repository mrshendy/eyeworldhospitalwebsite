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
        Schema::create('conference_advantge_translations', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nulable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('conference_advantge_id');
            $table->foreign('conference_advantge_id')->references('id')->on('conference_advantges')->onDelete('cascade');
            $table->string('locale')->index();
            $table->unique(['conference_advantge_id', 'locale'], 'conference_advantge_translations_unique');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conference_advantge_translations');
    }
};
