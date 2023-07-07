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
  # it takes 100 queues and in the SendWelcomeEmail thier is a sleep method of 3 seonds
  foreach (range(1, 100) as $item) {
    \App\Jobs\SendWelcomeEmail::dispatch()
      //    ->delay(5)
    ;
  }
  # create a new job and we want to prioritize it bcoz 👆 take too much time to execute queue one by one
  \App\Jobs\ProcessPayment::dispatch()
  ->onQueue("payment"); # we have to run  php artisan queue:work --queue=payments,default # it will execute payments queues first before it looks at the default queues
  ;

  return "Completed";
});
