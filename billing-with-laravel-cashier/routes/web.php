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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/subscribe', function () {
        return view('subscribe', [
          'intent' => auth()->user()->createSetupIntent()
        ]);
    })->name('subscribe');

    Route::post('/subscribe', function (\Illuminate\Http\Request $request) {
        auth()->user()->newSubscription(
          'cashier', $request->plan
        )->create($request->paymentMethod);

        return redirect()->route('dashboard');
    })->name('subscribe.post');
});
