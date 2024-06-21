<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Client\EstateController;
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

//
//Route::controller(LoginController::class)
//    ->middleware('guest')
//    ->group(function () {
//        Route::get('/login', 'create')->name('login');
//        Route::post('/login', 'store');
//    });
//
//Route::controller(RegisterController::class)
//    ->middleware('guest')
//    ->group(function () {
//        Route::get('/register', 'create')->name('register');
//        Route::post('/register', 'store');
//    });
//
//Route::controller(LoginController::class)
//    ->middleware('auth')
//    ->group(function () {
//        Route::post('/logout', 'destroy')->name('logout');
//    });
//
//Route::controller(HomeController::class)
//    ->group(function () {
//        Route::get('', 'index')->name('/');
//        Route::get('/locale/{locale}', 'language')->name('language')->where('locale', '[a-z]+');
//    });
//
//Route::controller(ContactController::class)->group(function () {
//    Route::get('/contact', 'index')->name('contact');
//    Route::post('/contact/store', 'store')->name('contact.store');
//});


Route::controller(HomeController::class)
    ->group(function () {
        Route::get('/', 'index')->name('home');
        Route::get('/locale/{locale}', 'locale')->name('locale')->whereIn('locale', ['tm', 'tr', 'en', 'ru',]);
    });

Route::controller(EstateController::class)
    ->prefix('estates')
    ->name('estates.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/userCars', 'userCars')->name('userCars')->middleware('auth');;
        Route::get('/{id}', 'show')->name('show')->where('id', '[0-9]+');
        Route::get('/{id}/favorite', 'favorite')->name('favorite')->where('id', '[0-9]+');
        Route::get('/create', 'create')->name('create')->middleware('auth');
        Route::post('/store', 'store')->name('store')->middleware('auth');
        Route::get('/{id}/edit', 'edit')->name('edit')->where('id', '[0-9A-Za-z-]+')->middleware('auth');
        Route::put('/{id}/update', 'update')->name('update')->where('id', '[0-9A-Za-z-]+')->middleware('auth');
        Route::delete('/{id}/delete', 'delete')->name('delete')->where('id', '[0-9A-Za-z-]+')->middleware('auth');
    });


Route::controller(ContactController::class)
    ->prefix('contacts')
    ->name('contacts.')
    ->group(function () {
        Route::get('', 'index')->name('index')->middleware('auth');
        Route::get('create', 'create')->name('create');
        Route::post('', 'store')->name('store');
    });

