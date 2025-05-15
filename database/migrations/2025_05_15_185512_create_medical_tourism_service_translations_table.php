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
        Schema::create('medical_tourism_service_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medical_tourism_service_id')->nullable();
            $table->foreign('medical_tourism_service_id', 'mt_translation_service_fk')
                ->references('id')
                ->on('medical_tourism_services')
                ->onDelete('cascade');
            $table->string('locale')->index();
            $table->string('title');
            $table->text('description')->nullable();
            $table->unique(['medical_tourism_service_id', 'locale'], 'mt_service_id_locale_unique');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_tourism_service_translations');
    }
};
