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
        Schema::create('participation_type_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('participation_type_id')->nullable();
            $table->foreign('participation_type_id')->references('id')->on('participation_types')->onDelete('cascade');
            $table->string('locale')->index();
            $table->string('title');
            $table->unique(['participation_type_id', 'locale'], "participation_type_id_locale_unique");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participation_type_translations');
    }
};
