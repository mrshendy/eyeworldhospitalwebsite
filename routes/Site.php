<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\{HomeController,SpecialtieController,EyeHealthInfoController,
    RateController,VideoController,PartnerController,RightController,TeamController,MedicalDeviceController, MedicalTourismController,ReservationController,
    AuthController,ConferenceController, UserController, MedicalAcademyController,BookController, CartController, SinglePageController};

Route::group(['prefix'=>LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){
    Route::get('/download/book/{book}', [BookController::class, 'download'])->name('book.download');

    Route::resources([
        'home' => HomeController::class,
        'EyeHealthInfo' => EyeHealthInfoController::class,
        'books' => BookController::class
    ]);


    Route::get('/' ,[HomeController::class, 'index'])->name('home.index');

    Route::post('contact-us' ,[HomeController::class, 'contactUs'])->name('contact-us');

    Route::get('specialties/{slug}' ,[SpecialtieController::class, 'index'])->name('specialtie');

    Route::get('specialty/{slug}' ,[SpecialtieController::class, 'subSpecialtieDetail'])->name('specialtie-detail');

    Route::get('/customers-reviews' ,[RateController::class, 'index'])->name('rate.index');

    Route::get('/articles/{slug}' ,[EyeHealthInfoController::class, 'getArticle'])->name('article.detail');


    Route::get('/videos/health/{topic}' ,[VideoController::class, 'healthVideo'])->name('video.health');
    Route::get('/videos/experiments/{topic}' ,[VideoController::class, 'experimentsVideo'])->name('video.experiments');

    Route::get('partners' ,[PartnerController::class, 'index'])->name('partners.index');
    Route::get('rights' ,[RightController::class, 'index'])->name('rights.index');
    Route::get('specialists/{specialty_slug}' ,[TeamController::class, 'index'])->name('teams.index');
    Route::get('doctors/{doctor_slug}/{specialty_slug?}' ,[TeamController::class, 'profile'])->name('teams.profile');


    Route::get('medical-devices', [MedicalDeviceController::class, 'index'])->name('medicalDevices.index');
    Route::get('medical-devices/{slug}', [MedicalDeviceController::class, 'show'])->name('medicalDevices.show');
    Route::get('/medical-devices/get-devices-by-specialty', [MedicalDeviceController::class, 'getMedicalDevicesBySpecialty'])->name('getMedicalDevicesBySpecialty');

    Route::get('medical-tourism', [MedicalTourismController::class, 'index'])->name('medicalTourism.index');

    Route::get('conferences', [ConferenceController::class, 'index'])->name('conference.index');
    Route::get('conferences/{slug}', [ConferenceController::class, 'show'])->name('conference.show');

    Route::get('reservation/appoint_ment/{doctor_id}/{date}', [ReservationController::class, 'doctorAppointment'])->name('reservation.Appointment');


    Route::get('register', [AuthController::class, 'index'])->name('register.index');
    Route::post('register', [AuthController::class, 'register'])->name('register');
    Route::get('login', [AuthController::class, 'loginIndex'])->name('login.index');
    Route::get('reset-password', [AuthController::class, 'resetpassword'])->name('resetpassword');
    Route::post('reset-password', [AuthController::class, 'sendResetLink'])->name('resetpassword.send');
    Route::get('/reset-password/form', [AuthController::class, 'showResetForm'])->name('password.reset.form');
    Route::post('/reset-password/update', [AuthController::class, 'resetPasswordPost'])->name('password.reset.update');

    Route::get('doctor/conferences', [UserController::class, 'doctor_conferences'])->name('doctor.conferences');
    Route::get('doctor/academy', [UserController::class, 'doctor_academy'])->name('doctor.academy');
    Route::get('doctor/requests', [UserController::class, 'doctor_requests'])->name('doctor.requests');
    Route::get('doctor/requests/{order}', [UserController::class, 'show_order'])->name('doctor.order.show');
    Route::get('doctor/books', [UserController::class, 'doctor_books'])->name('doctor.books');





    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('conferences/{slug}/booking', [ConferenceController::class, 'booking_conference'])->name('conference.booking')->middleware(['web']);
    Route::post('conferences/{slug}/booking', [ConferenceController::class, 'store_booking'])->name('conference.booking.store')->middleware(['web']);
    Route::get('conferences/booking/success', [ConferenceController::class, 'success'])->name('conference.success');

    Route::get('medical-academies', [MedicalAcademyController::class, 'index'])->name('medical-academy.index');
    Route::get('medical-academies/{slug}', [MedicalAcademyController::class, 'show'])->name('medical-academy.show');

    // Start Cart
    Route::middleware(['auth', 'web'])->group(function () {
        Route::get('cart', [CartController::class, 'index'])->name('cart.index');
        Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
        Route::delete('/cart/remove/{item}', [CartController::class, 'remove'])->name('cart.remove');
        Route::put('/cart/update/{item}', [CartController::class, 'update'])->name('cart.update');
        Route::delete('/cart/delete-all', [CartController::class, 'delete_all'])->name('cart.deleteAll');

        Route::get('checkout', [CartController::class, 'checkout'])->name('Checkout');
        Route::post('/checkout', [CartController::class, 'make_order'])->name('Order.make');
        Route::get('reservation/{doctor_id}/{reservationType}', [ReservationController::class, 'index'])->name('reservation.index');
        Route::post('reservation', [ReservationController::class, 'store'])->name('reservation.store');
        Route::get('user_reservations', [ReservationController::class, 'user_reservations'])->name('user_reservations');
        Route::get('user_reservations/{id}', [ReservationController::class, 'show'])->name('user_reservations.show');
        Route::post('user_reservations/{id}/cancel', [ReservationController::class, 'cancel'])->name('user_reservations.cancel');
        Route::get('/user/settings', [UserController::class, 'edit'])->name('user.settings');
        Route::post('/user/settings', [UserController::class, 'update'])->name('user.settings.update');
        Route::get('/user/delete', [UserController::class, 'delete_account'])->name('user.settings.delete_account');
        Route::delete('/user/delete', [UserController::class, 'destroy'])->name('user.settings.delete');

    });
    Route::get('faqs', [SinglePageController::class, 'faqs'])->name('faqs');
    Route::get('terms', [SinglePageController::class, 'terms'])->name('terms');
    Route::get('privacy', [SinglePageController::class, 'privacy'])->name('privacy');
    Route::get('contact-us', [SinglePageController::class, 'contact_us'])->name('contact');

});
