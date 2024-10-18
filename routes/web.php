<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\UserGuest;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function(){
    Route::get('/profile', [AuthController::class, 'Profile']);

    Route::get('/logout', [AuthController::class, 'Logout']);
});


Route::middleware(UserGuest::class)->group(function(){
    Route::get('/register', [AuthController::class, 'RegisterForm']);
    Route::post('/register', [AuthController::class, 'Register']);
    Route::get('/login', [AuthController::class, 'LoginForm'])->name(name: 'login');
    Route::post('/login', [AuthController::class, 'Login']);

});

