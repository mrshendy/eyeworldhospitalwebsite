<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\{HomeController,SpecialtieController,EyeHealthInfoController,
    RateController,VideoController,PartnerController,RightController,TeamController,MedicalDeviceController,ReservationController};

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

    Route::get('partners' ,[PartnerController::class, 'index'])->name('partners.index');
    Route::get('rights' ,[RightController::class, 'index'])->name('rights.index');
    Route::get('teams/{specialty_id}' ,[TeamController::class, 'index'])->name('teams.index');
    Route::get('profile/{doctor_id}/{specialtie_id}' ,[TeamController::class, 'profile'])->name('teams.profile');


    Route::get('medical-devices', [MedicalDeviceController::class, 'index'])->name('medicalDevices.index');
    Route::get('medical-devices/{id}', [MedicalDeviceController::class, 'show'])->name('medicalDevices.show');
    Route::get('/medical-devices/get-devices-by-specialty', [MedicalDeviceController::class, 'getDevicesBySpecialty'])->name('getMedicalDevicesBySpecialty');



    Route::get('reservation/{doctor_id}', [ReservationController::class, 'index'])->name('reservation.index');
    Route::post('reservation', [ReservationController::class, 'store'])->name('reservation.store');
    
    Route::get('reservation/{doctor_id}/{date}', [ReservationController::class, 'doctorAppointment'])->name('reservation.Appointment');

});

