<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

// Generate sitemap daily
Artisan::command('sitemap:generate', function () {
    $this->call('app:generate-sitemap');
})->purpose('Generate XML sitemap for SEO')->daily();
