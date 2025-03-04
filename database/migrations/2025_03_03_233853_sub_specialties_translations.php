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
        Schema::create('sub_specialtie_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('sub_specialtie_id');
            $table->foreign('sub_specialtie_id')->references('id')->on('sub_specialties')->onDelete('cascade');
            $table->string('locale')->index();
            $table->string('title');
            $table->unique(['sub_specialtie_id', 'locale']);
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
