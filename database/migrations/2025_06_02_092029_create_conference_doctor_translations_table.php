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
        Schema::create('conference_doctor_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('conference_doctor_id')->constrained('conference_doctors')->onDelete('cascade');
            $table->string('locale')->index();
            $table->string('name');
            $table->string('specialty')->nullable();
            $table->unique(['conference_doctor_id', 'locale'], 'conference_doctor_id_locale_unique');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conference_doctor_translations');
    }
};
