<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\{HomeController,SpecialtieController,EyeHealthInfoController,RateController,VideoController};

Route::group(['prefix'=>LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){

    Route::resources([
        'home' => HomeController::class,
        'EyeHealthInfo' => EyeHealthInfoController::class
    ]);


    Route::get('/' ,[HomeController::class, 'index'])->name('home.index');
    
    Route::post('contact-us' ,[HomeController::class, 'contactUs'])->name('contact-us');

    Route::get('specialtie/{id}' ,[SpecialtieController::class, 'index'])->name('specialtie');

    Route::get('specialtie-detail/{id}' ,[SpecialtieController::class, 'subSpecialtieDetail'])->name('specialtie-detail');

    Route::get('/customers-reviews' ,[RateController::class, 'index'])->name('rate.index');

    Route::get('/article-detail/{id}' ,[EyeHealthInfoController::class, 'getArticle'])->name('article.detail');


    Route::get('/videos/health/{topic}' ,[VideoController::class, 'healthVideo'])->name('video.health');
    Route::get('/videos/experiments/{topic}' ,[VideoController::class, 'experimentsVideo'])->name('video.experiments');


});

