<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\GeneralController::class, 'index'])->name('landing');
Route::get('/kriteria-rtlh', [App\Http\Controllers\GeneralController::class, 'kriteria'])->name('kriteria');

Auth::routes([
    'register' => false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [App\Http\Controllers\RegisteredUserController::class, 'index'])->name('dashboard');

Route::get('/data-rtlh', [App\Http\Controllers\RegisteredUserController::class, 'datartlh'])->name('datartlh');

Route::get('/data-verifikasi', [App\Http\Controllers\RegisteredUserController::class, 'dataverifikasi'])->name('dataverifikasi');

Route::get('/data-kk', [App\Http\Controllers\RegisteredUserController::class, 'datakk'])->name('datakk');
Route::post('/data-kk/add', [App\Http\Controllers\RegisteredUserController::class, 'adddatakk'])->name('adddatakk');
