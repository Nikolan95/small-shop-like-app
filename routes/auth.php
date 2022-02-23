<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/register', [UserController::class, 'register']);

Route::post('/registerpage', [UserController::class, 'store'])->name('user.store');
Route::post('/loginpage', [UserController::class, 'loginDoctor'])->name('doctor.login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

