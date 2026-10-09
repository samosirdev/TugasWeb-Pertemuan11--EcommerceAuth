<?php

use App\Http\Controllers\{PostController, ProductController, ProfileController};
use Illuminate\Support\Facades\Route;

// Publik
Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/demo-eager', [ProductController::class, 'demoEager']);

// Semua user yang login
Route::get('/dashboard', fn () => view('dashboard'))->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Khusus ADMIN
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', fn () => view('admin.dashboard'))->name('admin.dashboard');
});

// ADMIN + EDITOR
Route::middleware(['auth', 'role:admin,editor'])->group(function () {
    Route::resource('posts', PostController::class)->except('show');
});

require __DIR__ . '/auth.php';