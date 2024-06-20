<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\EstateController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


require __DIR__.'/web_client.php';
require __DIR__.'/web_admin.php';


require __DIR__ . '/auth.php';

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

