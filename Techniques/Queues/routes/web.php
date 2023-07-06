<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
//  logger("Hello World"); # It executes, so we can view it in laravel.log file

  # We use redis for queue so install it and enable it in php. so when i run php artisan queue:work then it executes and show in the log file, and we can also set delays
  dispatch(function () {
    logger("I have to tell you about Delay Queue Job");
  })->delay(now()->addMinutes(1));

  return "Finished";
});
