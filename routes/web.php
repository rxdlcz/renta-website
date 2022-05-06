<?php

use App\Http\Controllers\AuthController;
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

    Route::get('/', function () {
        return view('auth.login');
    })->middleware('alreadyLoggedIn');

    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/logout', [AuthController::class, 'logout']);


    Route::group(['middleware' => 'isLoggedIn'], function () {

        Route::get('/home', [PageController::class, 'home']);
        Route::get('/myAccount', [PageController::class, 'myAccount']);
        Route::post('/updatePass', [AuthController::class, 'updatePass']);
    });
});
