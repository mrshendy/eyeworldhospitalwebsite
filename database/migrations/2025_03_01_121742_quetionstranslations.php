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
        Schema::create('quetion_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('quetion_id')->unsigned();
            $table->string('locale')->index();
            $table->string('quetion');
            $table->text('answer')->nullable();
            $table->unique(['quetion_id', 'locale']);
            $table->foreign('quetion_id')->references('id')->on('quetions')->onDelete('cascade');
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
