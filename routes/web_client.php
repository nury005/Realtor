<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\NoteController;
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


Route::controller(LoginController::class)
    ->middleware('guest')
    ->group(function () {
        Route::get('/login', 'create')->name('login');
        Route::post('/login', 'store');
    });

Route::controller(RegisterController::class)
    ->middleware('guest')
    ->group(function () {
        Route::get('/register', 'create')->name('register');
        Route::post('/register', 'store');
    });

Route::controller(LoginController::class)
    ->middleware('auth')
    ->group(function () {
        Route::post('/logout', 'destroy')->name('logout');
    });

Route::controller(HomeController::class)
    ->group(function () {
        Route::get('', 'index')->name('/');
        Route::get('/locale/{locale}', 'language')->name('language')->where('locale', '[a-z]+');
    });

Route::controller(NoteController::class)->group(function () {
    Route::get('/note', 'index')->name('note');
    Route::post('/note/store', 'store')->name('note.store');
});