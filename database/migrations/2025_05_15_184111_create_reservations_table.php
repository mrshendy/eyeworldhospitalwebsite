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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_id')->nullable();
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('SET NULL');
            $table->unsignedBigInteger('specialtie_id')->nullable();
            $table->foreign('specialtie_id')->references('id')->on('specialties')->onDelete('SET NULL');
            $table->unsignedBigInteger('sub_specialtie_id')->nullable();
            $table->foreign('sub_specialtie_id')->references('id')->on('sub_specialties')->onDelete('SET NULL');
            $table->string('patient_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->boolean('urgent')->default(false);
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('SET NULL');
            $table->enum('payment_method',['cash','visa','apple_pay'])->default('cash');
            $table->text('name');
            $table->time('time_from');
            $table->time('time_to');
            $table->date('date');
            $table->double('price')->default(0);
            $table->enum('payment_status',['paid','pending'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
