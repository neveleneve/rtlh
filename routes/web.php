<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\GeneralController::class, 'index'])->name('landing');
Route::get('/kriteria-rtlh', [App\Http\Controllers\GeneralController::class, 'kriteria'])->name('kriteria');

Auth::routes([
    'register' => false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// general auth route
Route::get('/dashboard', [App\Http\Controllers\RegisteredUserController::class, 'index'])->name('dashboard');

// pupr auth route
Route::get('/data-rtlh', [App\Http\Controllers\RegisteredUserController::class, 'datartlh'])->name('datartlh');
Route::get('/data-kk', [App\Http\Controllers\RegisteredUserController::class, 'datakk'])->name('datakk');

// lapangan auth route
Route::get('/data-verifikasi', [App\Http\Controllers\RegisteredUserController::class, 'dataverifikasi'])->name('dataverifikasi');

Route::post('/data-kk/add', [App\Http\Controllers\RegisteredUserController::class, 'adddatakk'])->name('adddatakk');
Route::get('/data-kk/view/{id}', [App\Http\Controllers\RegisteredUserController::class, 'viewdatakk'])->name('viewdatakk');
Route::post('/data-kk/update', [App\Http\Controllers\RegisteredUserController::class, 'updatedatakk'])->name('updatedatakk');
Route::get('/data-kk/verifikasi/{id}', [App\Http\Controllers\RegisteredUserController::class, 'verifdatakk'])->name('verifdatakk');
