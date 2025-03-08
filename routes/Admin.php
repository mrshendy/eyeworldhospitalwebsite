<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{QuetionsController,AboutController,ContactUsController,SpecialtieController};

Route::group(['middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){

    Route::resources([
        'Quetions'  => QuetionsController::class,
        'abouts'    => AboutController::class,
        'contact-us'=> ContactUsController::class,
        'specialtie'=> SpecialtieController::class
    ]);

    Route::get('sup-specialtie/{id}' ,[SpecialtieController::class, 'supSpecialtie'])->name('sup-specialtie');
    Route::post('sup-specialtie/store' ,[SpecialtieController::class, 'supSpecialtieStore'])->name('sup-specialtie.store');

 });





