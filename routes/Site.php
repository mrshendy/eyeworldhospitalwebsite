<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\{HomeController};

Route::group(['prefix'=>LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){

    Route::resources([
        'home' => HomeController::class,
    ]);
    Route::post('contact-us' ,[HomeController::class, 'contactUs'])->name('contact-us');

});

