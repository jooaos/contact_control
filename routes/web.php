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

// Sign In
Route::get('/signin', [App\Http\Controllers\Auth\SignInController::class, 'show'])
    ->name('signin.view');

Route::post('/signin', [App\Http\Controllers\Auth\SignInController::class, 'handle'])
    ->name('signin');

// Sign UP
Route::get('/signup', [App\Http\Controllers\Auth\SignUpController::class, 'show'])
    ->name('signup.view');

Route::post('/signup', [App\Http\Controllers\Auth\SignUpController::class, 'handle'])
    ->name('signup');

// Logout
Route::get('/logout', [App\Http\Controllers\Auth\LogoutController::class, 'handle'])
    ->name('logout');