<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// general route
Route::get('/', [App\Http\Controllers\GeneralController::class, 'index'])->name('landing');
Route::get('/kriteria-rtlh', [App\Http\Controllers\GeneralController::class, 'kriteria'])->name('kriteria');

Auth::routes([
    'register' => false
]);

// general auth route
Route::get('/dashboard', [App\Http\Controllers\RegisteredUserController::class, 'index'])->name('dashboard');
Route::get('/data-kk', [App\Http\Controllers\RegisteredUserController::class, 'datakk'])->name('datakk');
Route::get('/data-kk/view/{id}', [App\Http\Controllers\RegisteredUserController::class, 'viewdatakk'])->name('viewdatakk');
Route::get('/bobot', [App\Http\Controllers\RegisteredUserController::class, 'bobot'])->name('bobot');

// pupr auth route
Route::get('/data-rtlh', [App\Http\Controllers\AdminPuController::class, 'datartlh'])->name('datartlh');
Route::get('/data-verifikasi', [App\Http\Controllers\AdminPuController::class, 'dataverifikasi'])->name('dataverifikasi');
Route::get('/data-kk/verifikasi/{id}', [App\Http\Controllers\AdminPuController::class, 'verifdatakk'])->name('verifdatakk');

// lapangan auth route
Route::post('/data-kk/add', [App\Http\Controllers\RegisteredUserController::class, 'adddatakk'])->name('adddatakk');
Route::post('/data-kk/update', [App\Http\Controllers\RegisteredUserController::class, 'updatedatakk'])->name('updatedatakk');
