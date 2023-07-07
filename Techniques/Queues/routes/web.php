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

  $user = User::first();

  $job = new ReconcileAccount($user);

  resolve(Dispatcher::class)->dispatch($job); # OR you can use Bus Facade  👉   \Illuminate\Support\Facades\Bus::dispatch($job);
  // 👆 this is a Shorthand of this 👇
  /*$pipeline = new Pipeline((app()));

  $pipeline->send($job)->through([])->then(function () use ($job) {
    $job->handle();
  });*/

  return "done";
});
