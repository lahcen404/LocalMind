<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('welcome');});

Route::get('/dashbaord' , function(){return view('auth.login');})->name('dashboard');
Route::get('/login' , function(){return view('auth.login');})->name('login');
Route::get('/register', function(){return view('auth.register');})->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');