<?php

use App\Models\SocialMedia;

function checkServiceUrl()
{
    $currentRouteName = Route::currentRouteName();
    if ($currentRouteName == 'Admin.Insurance-partner-detail'
     || $currentRouteName == 'Admin.customer-right-info-detail'
     || $currentRouteName == 'Admin.customer-rate-info-detail'

      || $currentRouteName == 'Admin.customer-video-detail'
      || $currentRouteName == 'Admin.Topics'
      || $currentRouteName == 'Admin.eye-health-video'
      || $currentRouteName == 'Admin.eye-health-detail'

      || $currentRouteName == 'Admin.rights.index'
      || $currentRouteName == 'Admin.videos.index'
      || $currentRouteName == 'Admin.rates.index'
      || $currentRouteName == 'Admin.partners.index'
      || $currentRouteName == 'Admin.articles.index'
      || $currentRouteName == 'Admin.partners.create'
      || $currentRouteName == 'Admin.partners.show'
      || $currentRouteName == 'Admin.articles.create'
      || $currentRouteName == 'Admin.articles.show'

    ) {
        return true;
    }

    return false;
}

function media()
{
    return SocialMedia::get();
}

function active_class($route)
{
    return request()->routeIs($route) ? 'active' : '';
}

function getSpecialtieIdAttribute()
{
    return $this->specialtie?->specialtie_id;
}

if (! function_exists('home_content')) {
    /** Editable homepage text (Dashboard > Homepage content). */
    function home_content(string $key): string
    {
        return \App\Models\HomeContent::value($key);
    }
}

if (! function_exists('home_visible')) {
    /** Whether a homepage section is switched on in the dashboard. */
    function home_visible(string $section): bool
    {
        return \App\Models\HomeContent::value($section.'.visible') === '1';
    }
}

if (! function_exists('home_image')) {
    /** URL of an editable homepage image (uploaded file or the original asset). */
    function home_image(string $key): string
    {
        $value = \App\Models\HomeContent::value($key);

        return str_starts_with($value, 'siteassets/') ? asset($value) : asset('uploads/home/'.$value);
    }
}

if (! function_exists('home_lines')) {
    /** Editable list (one item per line). */
    function home_lines(string $key): array
    {
        return array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', home_content($key)))));
    }
}
