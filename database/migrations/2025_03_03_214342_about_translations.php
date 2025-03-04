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
        Schema::create('about_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('about_id');
            $table->string('locale')->index();
            $table->string('title');
            $table->string('sub_title');
            $table->text('desc')->nullable();
            $table->unique(['about_id', 'locale']);
            $table->foreign('about_id')->references('id')->on('abouts')->onDelete('cascade');
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
