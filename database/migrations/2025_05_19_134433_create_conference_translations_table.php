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
        Schema::create('conference_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('conference_id')->nullable();
            $table->foreign('conference_id')->references('id')->on('conferences')->onDelete('cascade');
            $table->string('locale')->index();
            $table->string('title');
            $table->string('sub_title');
            $table->text('description')->nullable();
            $table->text('detail_description')->nullable();
            $table->unique(['conference_id', 'locale'], 'conference_id_locale_unique');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conference_translations');
    }
};
