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
        //
        Schema::create('sub_specialties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('specialtie_id');
            $table->foreign('specialtie_id')->references('id')->on('specialties')->onDelete('cascade');
            $table->string('img')->nullable();
            $table->boolean('activation')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
