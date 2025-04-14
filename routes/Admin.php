<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{QuetionsController,AboutController,
    ContactUsController,SpecialtieController,SpecialtieTypeController,
    AuthController,EyeHealthInfoController,ArticleController,EyeHealthVideoController,VideosController,TopicController,
    CustomerVideoController,CustomerRateInfoController,RateController,RightInfoController,RightController,
    InsurancePartnerInfoController,PartnerController};


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
        'specialtie'=> SpecialtieController::class,
        'articles'  => ArticleController::class,
        'rates'     => RateController::class,
        'rights'    => RightController::class,
        'partners' => PartnerController::class
    ]);

    Route::resource('videos', VideosController::class)->except([
        'index' ,'show','create'
    ]);
    Route::get('videos/{type}' ,[VideosController::class, 'index'])->name('videos.index');
    Route::get('videos/create/{type}' ,[VideosController::class, 'create'])->name('videos.create');

    Route::resource('rights', RightController::class)->except([
        'index'
    ]);
    Route::get('patient-rights/{type}' ,[RightController::class, 'index'])->name('rights.index');



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



    Route::get('eye-health-detail' ,[EyeHealthInfoController::class, 'detail'])->name('eye-health-detail');
    Route::post('eye-health-detail-update' ,[EyeHealthInfoController::class, 'update'])->name('eye-health-detail.update');


    Route::get('eye-health-video' ,[EyeHealthVideoController::class, 'detail'])->name('eye-health-video');
    Route::post('eye-health-video-update' ,[EyeHealthVideoController::class, 'update'])->name('eye-health-video.update');

    Route::get('topics/{id}' ,[TopicController::class, 'index'])->name('Topics');
    Route::post('topic/store' ,[TopicController::class, 'store'])->name('Topic.store');
    Route::post('topic/update/{type}' ,[TopicController::class, 'update'])->name('Topic.update');
    Route::post('topic/destroy/{type}' ,[TopicController::class, 'destroy'])->name('Topic.destroy');


    Route::get('customer-video' ,[CustomerVideoController::class, 'detail'])->name('customer-video-detail');
    Route::post('customer-info-video-update' ,[CustomerVideoController::class, 'update'])->name('customer-video.update');


    Route::get('customer-rate-info' ,[CustomerRateInfoController::class, 'detail'])->name('customer-rate-info-detail');
    Route::post('customer-rate-info-update' ,[CustomerRateInfoController::class, 'update'])->name('customer-rate-info.update');


    Route::get('customer-right-info' ,[RightInfoController::class, 'detail'])->name('customer-right-info-detail');
    Route::post('customer-right-info-update' ,[RightInfoController::class, 'update'])->name('customer-right-info.update');

    Route::get('Insurance-partner-info' ,[InsurancePartnerInfoController::class, 'detail'])->name('Insurance-partner-detail');
    Route::post('Insurance-partner-info-update' ,[InsurancePartnerInfoController::class, 'update'])->name('Insurance-partner.update');

    



  //  Route::get('articles' ,[ArticleController::class, 'index'])->name('articles.index');


    //  });

// });






