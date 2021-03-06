<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\PageController;
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


Route::group(['middleware' => 'prevent-back-history'], function () {

    Route::get('/login', function () {
        return view('auth.login');
    })->middleware('alreadyLoggedIn');

    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/logout', [AuthController::class, 'logout']);

    //Route for Links
    Route::get('/', [PageController::class, 'home']);
    Route::get('/aboutUs', [PageController::class, 'aboutUs']);
    Route::get('/contactUs', [PageController::class, 'contactUs']);

    //Book Now Email
    Route::post('/bookNow', [EmailController::class, 'bookNow']);
    Route::get('/confirmBooking/{token}', [EmailController::class, 'confirmBooking'])->name('confirm.booking.form');
    Route::post('/confirmBookingStep2', [EmailController::class, 'confirmBookingStep2']);

    //Contact Us Email
    Route::post('/contactUs', [EmailController::class, 'contactUs']);

    //Check For Login Session
    Route::group(['middleware' => 'isLoggedIn'], function () {
        Route::get('/myAccount', [PageController::class, 'myAccount']);
        Route::post('/updatePass', [AuthController::class, 'updatePass']);
    });
});
