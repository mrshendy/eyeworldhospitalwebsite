<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{QuetionsController,AboutController,ContactUsController};

Route::group(['middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){

    Route::resources([
        'Quetions'  => QuetionsController::class,
        'abouts'    => AboutController::class,
        'contact-us'=> ContactUsController::class
    ]);

 });





