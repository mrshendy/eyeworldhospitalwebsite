<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{QuetionsController,AboutController,
    ContactUsController,SpecialtieController,SpecialtieTypeController,
    AuthController};


 Route::get('login' ,[AuthController::class, 'index'])->name('login.index');
 Route::post('login' ,[AuthController::class, 'login'])->name('login');
 Route::get('logout' ,[AuthController::class, 'logout'])->name('logout');

//  Route::middleware('auth:admin')->group(function(){
// Route::group(['middleware' => 'auth:admin'], function() {
// Route::group(['middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){

    Route::resources([
        'Quetions'  => QuetionsController::class,
        'abouts'    => AboutController::class,
        'contact-us'=> ContactUsController::class,
        'specialtie'=> SpecialtieController::class
    ]);

    Route::get('specialtie/detail/{id}' ,[SpecialtieController::class, 'detail'])->name('specialtie.detail');


    Route::get('sup-specialtie/{id}' ,[SpecialtieController::class, 'supSpecialtie'])->name('sup-specialtie');
    Route::post('sup-specialtie/store' ,[SpecialtieController::class, 'supSpecialtieStore'])->name('sup-specialtie.store');
    Route::put('sup-specialtie/update' ,[SpecialtieController::class, 'supSpecialtieUpdate'])->name('sup-specialtie.update');
    Route::post('sup-specialtie/destroy' ,[SpecialtieController::class, 'destroySubSpecialtie'])->name('sup-specialtie.destroy');
    Route::get('sup-specialtie/detail/{id}' ,[SpecialtieController::class, 'subSpetialtieDetail'])->name('sup-specialtie.detail');



    Route::get('sup-specialtie-type/{id}' ,[SpecialtieTypeController::class, 'supSpecialtieType'])->name('sup-specialtie-type');
    Route::post('sup-specialtie-type/store' ,[SpecialtieTypeController::class, 'supSpecialtieTypeStore'])->name('sup-specialtie-type.store');
    Route::put('sup-specialtie-type/update' ,[SpecialtieTypeController::class, 'supSpecialtieTypeUpdate'])->name('sup-specialtie-type.update');
    Route::post('sup-specialtie-type/destroy' ,[SpecialtieTypeController::class, 'destroySubSpecialtieType'])->name('sup-specialtie-type.destroy');

    //  });

// });






