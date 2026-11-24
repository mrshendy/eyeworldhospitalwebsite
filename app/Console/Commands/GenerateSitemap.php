<?php

namespace App\Console\Commands;

use App\Models\Article;
use App\Models\Conference;
use App\Models\Doctor;
use App\Models\MedicalAcademy;
use App\Models\MedicalDevice;
use App\Models\Specialtie;
use App\Models\SubSpecialtie;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate XML sitemap for SEO';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Generating sitemap...');

        $sitemap = Sitemap::create();

        // Add homepage
        $this->addUrlWithAlternates($sitemap, url('/'), 1.0, 'daily');

        // Add static pages
        $staticPages = [
            'customers-reviews',
            'partners',
            'rights',
            'faqs',
            'terms',
            'privacy',
            'contact-us',
            'medical-tourism',
            'books',
        ];

        foreach ($staticPages as $page) {
            $this->addUrlWithAlternates($sitemap, url($page), 0.8, 'weekly');
        }

        // Add models with slug routes
        $this->addModelUrls($sitemap, Specialtie::all(), 'Site.specialtie', 0.9, 'weekly');
        $this->addModelUrls($sitemap, SubSpecialtie::all(), 'Site.specialtie-detail', 0.8, 'weekly');
        $this->addModelUrls($sitemap, Conference::all(), 'Site.conference.show', 0.8, 'monthly');
        $this->addModelUrls($sitemap, MedicalDevice::all(), 'Site.medicalDevices.show', 0.7, 'monthly');
        $this->addModelUrls($sitemap, MedicalAcademy::all(), 'Site.medical-academy.show', 0.7, 'monthly');
        $this->addModelUrls($sitemap, Article::all(), 'Site.article.detail', 0.6, 'weekly');

        // Add doctors (profile + specialty) with proper alt-language links
        $doctors = Doctor::with('info', 'specialtie')->get();
        foreach ($doctors as $doctor) {
            if ($doctor->specialtie && $doctor->slug) {
                $path = route('Site.teams.profile', [$doctor->slug, $doctor->specialtie->slug], false);
                $this->addUrlWithAlternates($sitemap, url($path), 0.6, 'weekly');
            }
        }

        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully at public/sitemap.xml');
    }

    private function addModelUrls($sitemap, $models, $routeName, $priority, $frequency)
    {
        foreach ($models as $model) {
            if ($model->slug) {
                $path = route($routeName, $model->slug, false);
                $this->addUrlWithAlternates($sitemap, url($path), $priority, $frequency);
            }
        }
    }

    /**
     * Add URL with its hreflang alternates.
     */
    private function addUrlWithAlternates(Sitemap $sitemap, string $url, float $priority, string $frequency)
    {
        $locales = $this->getLocales();
        $defaultLocale = config('app.locale', 'en');

        $alternates = [];
        foreach ($locales as $locale) {
            $alternates[$locale] = $this->localizeUrl($url, $locale) ?: $url;
        }

        // One <url> entry per language, each pointing at the final (already localized) address,
        // so search engines never hit a redirect when they crawl the sitemap.
        foreach ($alternates as $locale => $localizedUrl) {
            $urlTag = Url::create($localizedUrl)->setPriority($priority)->setChangeFrequency($frequency);

            foreach ($alternates as $altLocale => $altUrl) {
                $urlTag->addAlternate($altUrl, $altLocale);
            }
            if (isset($alternates[$defaultLocale])) {
                $urlTag->addAlternate($alternates[$defaultLocale], 'x-default');
            }

            $sitemap->add($urlTag);
        }
    }

    private function getLocales(): array
    {
        $supportedLocales = config('laravellocalization.supportedLocales', []);
        if (! is_array($supportedLocales) || empty($supportedLocales)) {
            return [config('app.locale', 'en')];
        }

        return array_keys($supportedLocales);
    }

    /**
     * Helper to convert a URL to locale-specific version.
     */
    private function localizeUrl(string $url, string $locale, bool $forceDefault = false): ?string
    {
        if (! app()->bound('laravellocalization')) {
            return $url;
        }

        try {
            $localized = app('laravellocalization')->getLocalizedURL($locale, $url, [], $forceDefault);

            return $localized ?: $url;
        } catch (\Exception $e) {
            return $url;
        }
    }
}
