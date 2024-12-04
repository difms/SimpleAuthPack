<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\AuthController;

Route::get('/register', fn() => view('auth.register'))->name('register.view');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', fn() => view('auth.login'))->name('login.view');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('google.callback');

Route::get('/dashboard', fn() => 'Ты попал :)')->middleware('auth')->name('dashboard');
