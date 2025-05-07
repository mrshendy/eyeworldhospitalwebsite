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
        Schema::create('doctor_service_info_translations', function (Blueprint $table) {
            $table->id();
            $table->text('info');
            $table->unsignedBigInteger('info_id');
            $table->foreign('info_id')->references('id')->on('doctor_service_infos')->onDelete('cascade');
            $table->string('locale')->index();
            $table->unique(['info_id', 'locale']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_service_info_translations');
    }
};
