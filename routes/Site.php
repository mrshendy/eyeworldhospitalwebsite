<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\{HomeController,SpecialtieController,EyeHealthInfoController,
    RateController,VideoController,PartnerController,RightController,TeamController,MedicalDeviceController, MedicalTourismController,ReservationController,
    AuthController,ConferenceController, MedicalAcademyController,BookController, CartController};

Route::group(['prefix'=>LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){

    Route::resources([
        'home' => HomeController::class,
        'EyeHealthInfo' => EyeHealthInfoController::class,
        'books' => BookController::class
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

    Route::get('medical-tourism', [MedicalTourismController::class, 'index'])->name('medicalTourism.index');

    Route::get('conferences', [ConferenceController::class, 'index'])->name('conference.index');
    Route::get('conferences/{id}', [ConferenceController::class, 'show'])->name('conference.show');


    Route::get('reservation/{doctor_id}/{reservationType}', [ReservationController::class, 'index'])->name('reservation.index');
    Route::post('reservation', [ReservationController::class, 'store'])->name('reservation.store');

    Route::get('reservation/appoint_ment/{doctor_id}/{date}', [ReservationController::class, 'doctorAppointment'])->name('reservation.Appointment');


    Route::get('register', [AuthController::class, 'index'])->name('register.index');
    Route::post('register', [AuthController::class, 'register'])->name('register');
    Route::get('login', [AuthController::class, 'loginIndex'])->name('login.index');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('conferences/{id}/booking', [ConferenceController::class, 'booking_conference'])->name('conference.booking')->middleware(['web']);
    Route::post('conferences/{id}/booking', [ConferenceController::class, 'store_booking'])->name('conference.booking.store')->middleware(['web']);
    Route::get('conferences/booking/success', [ConferenceController::class, 'success'])->name('conference.success');

    Route::get('medical-academies', [MedicalAcademyController::class, 'index'])->name('medical-academy.index');
    Route::get('medical-academies/{id}', [MedicalAcademyController::class, 'show'])->name('medical-academy.show');

    // Start Cart
    Route::middleware(['auth', 'web'])->group(function () {
        Route::get('cart', [CartController::class, 'index'])->name('cart.index');
        Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
        Route::delete('/cart/remove/{item}', [CartController::class, 'remove'])->name('cart.remove');
        Route::put('/cart/update/{item}', [CartController::class, 'update'])->name('cart.update');
        Route::delete('/cart/delete-all', [CartController::class, 'delete_all'])->name('cart.deleteAll');
    });

});

