<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login-check', 'loginCheck')->name('login.check');
    Route::get('/register', 'register')->name('register');
    Route::post('/register-submit', 'registerSubmit')->name('register.submit');
    Route::get('/forgot-password', 'forgotPassword')->name('forgot');
    Route::get('/recover-password', 'recoverPassword')->name('recover');
    Route::get('/logout', 'logout')->name('logout');
});

Route::middleware(['auth'])->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });
});
