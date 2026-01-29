<?php

use App\Enums\UserRole;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ResponseController; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});


Route::middleware('auth')->group(function () {
    
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

  
    Route::get('/questions/create', [QuestionController::class, 'create'])->name('questions.create')->middleware('auth');

    


    Route::post('/questions', [QuestionController::class, 'store'])->name('questions.store');
    
    Route::post('/questions/{question}/responses', [ResponseController::class, 'store'])->name('responses.store');

   // membeer dashbaord
    Route::get('/member/dashboard', function () {
        if (Auth::user()->role != UserRole::MEMBER) {
            return redirect()->route('admin.dashboard')->with('error', 'Redirected to Admin area.');
        }
        return view('member.dashboard');
    })->name('dashboard');

    // admiin dashboard
    Route::get('/admin/dashboard', function () {
        if (Auth::user()->role != UserRole::ADMIN) {
            return redirect()->route('dashboard')->with('error', 'Access Denied.');
        }
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // favorite
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
    Route::post('/questions/{question}/favorite', [FavoriteController::class, 'toggle'])->name('questions.favorite');
    
});


Route::get('/questions', [QuestionController::class, 'index'])->name('questions.index');

Route::get('/questions/{question}', [QuestionController::class, 'show'])->name('questions.show');