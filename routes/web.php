<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/paypal/setup-transaction', [App\Http\Controllers\PaypalTransactionController::class, 'setUpTransaction'])->name('paypal.setup');
Route::get('/paypal/capture-transaction', [App\Http\Controllers\PaypalTransactionController::class, 'captureTransaction'])->name('paypal.capture');
