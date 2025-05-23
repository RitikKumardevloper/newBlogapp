<?php

use Illuminate\Support\Facades\Route;
use PharIo\Manifest\AuthorCollection;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

Route::get('/', [BlogController::class, 'index'])->name('blogs.index');

Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
Route::post('/blogs/store', [BlogController::class, 'store'])->name('blogs.store');
Route::get('/blogs/{id}', [BlogController::class, 'show'])->name('blogs.show');
Route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
Route::put('/blogs/{id}', [BlogController::class, 'update'])->name('blogs.update');
Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])->name('blogs.destroy');

Route::get('/myblogs', [BlogController::class, 'myblogs'])->middleware('auth')->name('blogs.myblogs');

// Auth routes 

Route::get('/register', [AuthController::class, 'registerForm'])->name('register.form');
Route::post('/register', [AuthController::class, "registerstore"])->name('register.store');

Route::get('/login', [AuthController::class, 'loginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::middleware('auth')->get('/profile', [ProfileController::class, 'show'])
    ->name('profile.show');
