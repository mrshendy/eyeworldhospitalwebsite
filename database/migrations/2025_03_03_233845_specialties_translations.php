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
        Schema::create('specialtie_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('specialtie_id');
            $table->foreign('specialtie_id')->references('id')->on('specialties')->onDelete('cascade');
            $table->string('locale')->index();
            $table->string('title');
            $table->string('subtitle')->nullable();

            $table->string('detail_title')->nullable();
            $table->string('detail_subtitle')->nullable();
            $table->text('desc')->nullable();
        

            $table->unique(['specialtie_id', 'locale']);
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
