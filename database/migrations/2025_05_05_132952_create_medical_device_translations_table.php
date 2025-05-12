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
        Schema::create('medical_device_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medical_device_id')->nullable();
            $table->foreign('medical_device_id')->references('id')->on('medical_devices')->onDelete('cascade');
            $table->string('locale')->index();
            $table->string('title');
            $table->string('sub_title')->nullable();
            $table->text('description')->nullable();
            $table->unique(['medical_device_id', 'locale']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_device_translations');
    }
};
