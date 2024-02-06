<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MyUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Now this is for login
Route::post('/login', [AuthController::class, 'login'])->name('login');

// This is for sign up form
Route::get('/signup-form', [Controller::class, 'showSignUpForm'])->name('signup-form');
Route::post('/signup-form', [MyUserController::class, 'store'])->name('submit.form')->middleware('web');
Route::post('/created', [MyUserController::class, 'store'])->name('created');

// Now to enter the dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');