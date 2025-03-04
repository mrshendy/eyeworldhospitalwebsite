<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\{HomeController};

Route::resources([
    'home' => HomeController::class,
]);


