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
        Schema::create('medical_tourism_info_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medical_tourism_info_id')->nullable();
            $table->foreign('medical_tourism_info_id', 'mt_translation_info_fk')
                ->references('id')
                ->on('medical_tourism_infos')
                ->onDelete('cascade');
            $table->string('locale')->index();
            $table->string('title');
            $table->string('sub_title')->nullable();
            $table->text('description')->nullable();
            $table->unique(['medical_tourism_info_id', 'locale'], 'mt_info_id_locale_unique');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_tourism_info_translations');
    }
};
