<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\{HomeController,SpecialtieController};

Route::group(['prefix'=>LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){

    Route::resources([
        'home' => HomeController::class,
    ]);
    Route::post('contact-us' ,[HomeController::class, 'contactUs'])->name('contact-us');

    Route::get('specialtie/{id}' ,[SpecialtieController::class, 'index'])->name('specialtie');

    Route::get('specialtie-detail/{id}' ,[SpecialtieController::class, 'subSpecialtieDetail'])->name('specialtie-detail');

});

