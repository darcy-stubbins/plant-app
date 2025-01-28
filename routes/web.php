<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

//redirect after registering to / instead of /home from the Laravel UI package 
Route::get('/home', function(){
    return redirect('/');
}); 
