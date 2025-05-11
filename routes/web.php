<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\MahasiswaController;

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
})->name('admin.dashboard');

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

Route::controller(DosenController::class)->middleware('auth')->group(function() {
    Route::get('/daftar-dosen', 'daftar_dosen')->name('daftar_dosen.index');
    Route::get('/dosen/destroy/{dosen_id}', 'destroy')->name('dosen.destroy');
});

Route::get('/dashboard/{dosen_id}', [DosenController::class, 'index'])->name('dosen.dashboard')->middleware('auth');

// Mata Kuliah Routes
Route::controller(MataKuliahController::class)->middleware('auth')->group(function() {
    Route::get('/matkul', 'index')->name('matkul.index');
    Route::get('/matkul/create', 'create')->name('matkul.create');
    Route::post('/matkul/store', 'store')->name('matkul.store');
    Route::get('/matkul/edit/{matkul_id}', 'edit')->name('matkul.edit');
    Route::post('/matkul/update/{matkul_id}', 'update')->name('matkul.update');
    Route::get('/matkul/destroy/{matkul_id}', 'destroy')->name('matkul.destroy');
});

// Semester Routes
Route::controller(SemesterController::class)->middleware('auth')->group(function() {
    Route::get('/semester', 'index')->name('semester.index');
    Route::get('/semester/create', 'create')->name('semester.create');
    Route::post('/semester/store', 'store')->name('semester.store');
    Route::get('/semester/edit/{semester_id}', 'edit')->name('semester.edit');
    Route::post('/semester/update/{semester_id}', 'update')->name('semester.update');
    Route::get('/semester/destroy/{semester_id}', 'destroy')->name('semester.destroy');
});

// Daftar Mahasiswa Routes
Route::controller(MahasiswaController::class)->middleware('auth')->group(function() {
    Route::get('/daftar-mahasiswa/{dosen_id}', 'index')->name('mahasiswa.index');
    Route::get('/mahasiswa/create/{dosen_id}', 'create')->name('mahasiswa.create');
    Route::post('/mahasiswa/store/{dosen_id}', 'store')->name('mahasiswa.store');
    Route::get('/mahasiswa/edit/{study_id}', 'edit')->name('mahasiswa.edit');
    Route::post('/mahasiswa/update/{study_id}', 'update')->name('mahasiswa.update');
    Route::get('/mahasiswa/destroy/{study_id}', 'destroy')->name('mahasiswa.destroy');
});
