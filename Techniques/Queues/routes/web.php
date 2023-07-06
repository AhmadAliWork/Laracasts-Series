<?php

use App\Jobs\ReconcileAccount;
use App\Models\User;
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
  # Pipeline
  $pipeline = app(Pipeline::class);

  /*
   * We can send data through some pipelines(some steps) and then we get the result
   * in this case we pass a string and in through we can pass Classes or callback functions like we did just like middleware we can pass $data and $next request
   *
  */
  $pipeline->send("hello freaking world")
    ->through([
      // send data through some series of classes / pipes
      function ($string, $next) {
        $string = ucwords($string); // Hello Freaking World
        return $next($string);

      },

      function ($string, $next) {
        $string = str_ireplace("freaking", '', $string); // Hello  World
        return $next($string);

      },

      ReconcileAccount::class // last pip so "Something else" in $string
    ])
    ->then(function ($string) {
      dump($string); // Something else
    });
  return "Done";

//  ReconcileAccount::dispatch();
});
