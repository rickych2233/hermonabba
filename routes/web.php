<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});

use App\Http\Controllers\BibleReadingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/bible-reading/{date}', [BibleReadingController::class, 'show'])->name('bible_reading.show');
Route::post('/bible-reading/{date}/comment', [BibleReadingController::class, 'storeComment'])->name('bible_reading.comment.store');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
