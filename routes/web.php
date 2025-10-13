<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasController;
use App\Http\Controllers\Auth\UserController;

Route::get('/login', [UserController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [UserController::class, 'login'])->name('login.post');

Route::middleware('auth')->group(function () {
    // Proses Logout
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');

    // Halaman-halaman utama aplikasi
    Route::get('/', [TasController::class, 'index'])->name('home');
    Route::get('/galeri', [TasController::class, 'galeri'])->name('galeri');
    Route::get('/tambah', [TasController::class, 'create'])->name('tambah.form');
    Route::post('/tambah', [TasController::class, 'store'])->name('tambah.store');
    Route::get('/tas/edit/{id}', [TasController::class, 'edit'])->name('tas.edit');
    Route::put('/tas/{id}', [TasController::class, 'update'])->name('tas.update');
    Route::delete('/tas/{id}', [TasController::class, 'destroy'])->name('tas.destroy');
});