<?php

use App\Enums\UserRole;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {return view('welcome');});
Route::middleware('auth')->group(function () {
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/member/dashboard' , function(){
 if(Auth::user()->role != UserRole::MEMBER ){
        return redirect()->route('admin.dashboard')->with('error', 'You dont have access ');

    }

return view('member.dashboard');})->name('dashboard');

Route::get('/admin/dashboard' , function(){
    if(Auth::user()->role != UserRole::ADMIN ){
        return redirect()->route('dashboard')->with('error', 'You dont have access ');

    }
    return view('admin.dashboard');})->name('admin.dashboard');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});