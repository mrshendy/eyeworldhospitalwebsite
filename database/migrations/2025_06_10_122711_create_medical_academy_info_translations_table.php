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
        Schema::create('medical_academy_info_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medical_academy_info_id')->nullable();
            $table->foreign('medical_academy_info_id', 'ma_info_trans_foreign')->references('id')->on('medical_academy_infos')->onDelete('cascade');
            $table->string('locale')->index();
            $table->string('title');
            $table->string('sub_title');
            $table->text('description')->nullable();
            $table->unique(['medical_academy_info_id', 'locale'], 'ma_info_id_locale_unique');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_academy_info_translations');
    }
};
