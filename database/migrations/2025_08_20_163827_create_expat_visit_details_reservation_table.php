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
        Schema::create('expat_visit_details_reservation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reservation_id');
            $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('cascade');
            $table->text('complaint')->nullable();
            $table->text('medical_history')->nullable();
            $table->string('attachment')->nullable();
            $table->string('treating_doctor')->nullable();
            $table->string('treating_doctor_speciality')->nullable();
            $table->string('treating_doctor_phone')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expat_visit_details_reservation');
    }
};
