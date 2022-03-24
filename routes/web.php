<?php

use App\Http\Controllers\UserController;
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
    return redirect(route('register'));
});

Auth::routes();

Route::group(['middleware'=>['web','auth']],function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::group(['prefix'=>'profile'],function() {
        Route::get('/', [UserController::class, 'getProfile'])->name('users.profile');
        Route::put('/', [UserController::class, 'updateProfile'])->name('users.profile.update');
    });
});

