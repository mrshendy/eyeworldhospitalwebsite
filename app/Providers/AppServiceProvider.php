<?php

namespace App\Providers;
use App\Models\SocialMedia;
use App\Models\Specialtie;
use App\Models\SubSpecialtie;
use App\Models\Conference;
use App\Models\MedicalDevice;
use App\Models\MedicalAcademy;
use App\Models\Article;
use App\Models\Doctor;
use App\Observers\SlugObserver;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        app()->bind('media', function () {
            return SocialMedia::get();
        });

        // Auto-generate slug on create/update when missing
        Specialtie::observe(SlugObserver::class);
        SubSpecialtie::observe(SlugObserver::class);
        Conference::observe(SlugObserver::class);
        MedicalDevice::observe(SlugObserver::class);
        MedicalAcademy::observe(SlugObserver::class);
        Article::observe(SlugObserver::class);
        Doctor::observe(SlugObserver::class);
    }
}