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
        Schema::create('book_info_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_info_id')->nullable();
            $table->foreign('book_info_id')->references('id')->on('book_infos')->onDelete('cascade');
            $table->string('locale')->index();
            $table->string('title')->nullable();
            $table->string('sub_title')->nullable();
            $table->text('description')->nullable();
            $table->unique(['book_info_id', 'locale'], 'book_info_id_locale_unique');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_info_translations');
    }
};
