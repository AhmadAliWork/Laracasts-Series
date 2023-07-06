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
//  dispatch(new ReconcileAccount($user));
  # 👆 this and this 👇 are functionally identical
  ReconcileAccount::dispatch($user); # we cab use this bcoz of the Dispatchable trait in ReconcileAccount class and it is preferable
  return "Finished";
});
