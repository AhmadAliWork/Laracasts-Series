<?php

use App\Jobs\ReconcileAccount;
use App\Models\User;
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
  $user = User::first();
  #  php artisan queue:table then migrate and run queue:work so in my db i wll check queues statuses
  ReconcileAccount::dispatch($user);

  return "Finished";
});
