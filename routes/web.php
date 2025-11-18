<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


//Test API
// Route::get('/test-api', function () {
//     return response()->json([
//         'message' => 'hello world'
//     ]);
// });