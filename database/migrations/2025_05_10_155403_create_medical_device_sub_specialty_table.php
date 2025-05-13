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
        Schema::create('medical_device_sub_specialty', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medical_device_id')->nullable();
            $table->unsignedBigInteger('sub_specialty_id')->nullable();

            $table->foreign('medical_device_id')->references('id')->on('medical_devices')->onDelete('cascade');
            $table->foreign('sub_specialty_id')->references('id')->on('sub_specialties')->onDelete('cascade');

            $table->unique(['medical_device_id', 'sub_specialty_id'], 'medical_device_sub_specialty_unique');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_device_sub_specialty');
    }
};
