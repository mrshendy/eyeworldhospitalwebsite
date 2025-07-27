<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            Route::prefix(LaravelLocalization::setLocale().'/Admin')
               ->middleware(['web'])
                ->name('Admin.')
                ->group(base_path('routes/Admin.php'));

            Route::name('Site.')
                ->middleware(['web'])
                ->group(base_path('routes/Site.php'));

        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
        $middleware->alias([
            'lang' => \App\Http\Middleware\lang::class,
            'localize'                => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRoutes::class,
            'localizationRedirect'    => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRedirectFilter::class,
            'localeSessionRedirect'   => \Mcamara\LaravelLocalization\Middleware\LocaleSessionRedirect::class,
            'localeCookieRedirect'    => \Mcamara\LaravelLocalization\Middleware\LocaleCookieRedirect::class,
            'localeViewPath'          => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationViewPath::class,
            'Alert'                   => RealRashid\SweetAlert\Facades\Alert::class,
        ])
        ->redirectGuestsTo(function (){
            $path = request()->path();
            if (str_contains($path, '/Admin') || request()->is('*/Admin*')) {
                return route('Admin.login');
            }
            return route('Site.login');
        });
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
