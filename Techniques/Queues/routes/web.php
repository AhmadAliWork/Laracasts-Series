<?php

use App\Jobs\ReconcileAccount;
use App\Models\User;
use Illuminate\Bus\Dispatcher;
use Illuminate\Pipeline\Pipeline;
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
  \App\Jobs\SendWelcomeEmail::dispatch();
  return "Completed";
});
