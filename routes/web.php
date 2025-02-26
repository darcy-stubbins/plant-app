<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

//routes used by Laravel UI package for auth
Auth::routes();

//redirect after registering to / instead of /home from the Laravel UI package 
Route::get('/home', function () {
    return redirect('/');
});

//homepage 
Route::get('/', [HomeController::class, 'index'])->name('home');

//profile
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

//categories 
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');

//the specific category 
Route::get('categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
