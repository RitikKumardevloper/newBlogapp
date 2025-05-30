<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

// Public routes
Route::get('/', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{id}', [BlogController::class, 'show'])->name('blogs.show');
Route::get('/vlogs', [BlogController::class, 'vlogsView'])->name('vlogs.view');
Route::get('/vlogs/data', [BlogController::class, 'vlogsData'])->name('vlogs.data');

// Authentication routes
Route::get('/register', [AuthController::class, 'registerForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'registerstore'])->name('register.store');
Route::get('/login', [AuthController::class, 'loginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Routes that require authentication
Route::middleware('auth')->group(function () {

    // Blog routes for authenticated users
    Route::get('/blog/create', [BlogController::class, 'create'])->name('blogs.create');
    Route::post('/blog/store', [BlogController::class, 'store'])->name('blogs.store');
    Route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
    Route::put('/blogs/{id}', [BlogController::class, 'update'])->name('blogs.update');
    Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])->name('blogs.destroy');

    // User's own blogs
    Route::get('/myblogs', [BlogController::class, 'myblogs'])->name('blogs.myblogs');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');

    // Logout route
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
