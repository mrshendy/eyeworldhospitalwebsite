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
           Schema::create('book_topic_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_topic_id')->nullable();
            $table->foreign('book_topic_id')->references('id')->on('topics')->onDelete('cascade');
            $table->string('locale')->index();
            $table->string('title');
            $table->text('desc')->nullable();
            $table->unique(['book_topic_id', 'locale']);
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
