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
        Schema::create('eye_health_info_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->text('desc')->nullable();
            $table->string('detail_title')->nullable();
            $table->string('detail_subtitle')->nullable();
            $table->text('detail_desc')->nullable();
            $table->unsignedBigInteger('info_id');
            $table->foreign('info_id')->references('id')->on('eye_health_infos')->onDelete('cascade');
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
        //
    }
};
