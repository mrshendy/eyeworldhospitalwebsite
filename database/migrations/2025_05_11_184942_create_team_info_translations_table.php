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
        Schema::create('team_info_translations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('sub_title')->nullable();
            $table->text('desc')->nullable();
            $table->unsignedBigInteger('info_id');
            $table->foreign('info_id')->references('id')->on('team_infos')->onDelete('cascade');
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
        Schema::dropIfExists('team_info_translations');
    }
};
