<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

/*
 * The default specialty picture (main1.svg) is a 7 MB SVG that only wraps a photo.
 * main1.webp is the same picture at ~25 KB.
 */
return new class extends Migration
{
    public function up(): void
    {
        DB::table('specialties')->where('img', 'main1.svg')->update(['img' => 'main1.webp']);
    }

    public function down(): void
    {
        DB::table('specialties')->where('img', 'main1.webp')->update(['img' => 'main1.svg']);
    }
};
