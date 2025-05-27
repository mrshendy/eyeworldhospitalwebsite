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
        Schema::create('chairity_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('chairity_id')->nullable();
            $table->foreign('chairity_id')->references('id')->on('chairities')->onDelete('cascade');
            $table->string('locale')->index();
            $table->string('title');
            $table->unique(['chairity_id', 'locale']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chairity_translations');
    }
};
