<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{QuetionsController,AboutController};

Route::resources([
    'Quetions' => QuetionsController::class,
    'abouts'   => AboutController::class
]);


