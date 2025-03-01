<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\QuetionsController;

Route::resources([
    'Quetions' => QuetionsController::class,
]);


