<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;

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

Route::controller(AuthController::class)->group(function() {
    // Login Routes
    Route::get('/login', 'login')->name('auth.login');
    Route::post('/login/auth', 'authorization')->name('auth.authorization');

    // Register Routes
    Route::get('/register', 'register')->name('auth.register');
    Route::post('/register/store', 'store')->name('auth.store');

    // Logout Route
    Route::get('/logout', 'logout')->name('auth.logout')->middleware('auth');
});

Route::get('/dashboard/{dosen_id}', [DosenController::class, 'index'])->name('dosen.dashboard')->middleware('auth');
