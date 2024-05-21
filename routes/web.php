<?php

use App\Http\Controllers\equimentsController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/cal', [HomeController::class, 'cal'])->name('cal');
Route::get('/delivery', [HomeController::class, 'delivery'])->name('delivery');
Route::resource('equiments', equimentsController::class);
