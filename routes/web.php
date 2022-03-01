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
Route::get('/setting', [App\Http\Controllers\RegisteredUserController::class, 'setting'])->name('setting');

Route::get('/bobot', [App\Http\Controllers\RegisteredUserController::class, 'bobot'])->name('bobot');

Route::get('/data-kk', [App\Http\Controllers\RegisteredUserController::class, 'datakk'])->name('datakk');
Route::get('/data-kk/view/{id}', [App\Http\Controllers\RegisteredUserController::class, 'viewdatakk'])->name('viewdatakk');

// pupr auth route
Route::get('/bobot/view/{id}', [App\Http\Controllers\AdminPuController::class, 'viewbobot'])->name('viewbobot');

Route::get('/data-rtlh', [App\Http\Controllers\AdminPuController::class, 'datartlh'])->name('datartlh');

Route::get('/data-kk/verifikasi/{id}', [App\Http\Controllers\AdminPuController::class, 'verifdatakk'])->name('verifdatakk');
Route::post('/data-kk/verifikasi', [App\Http\Controllers\AdminPuController::class, 'verifikasi'])->name('verifikasi');

Route::get('/administrator', [App\Http\Controllers\AdminPuController::class, 'administrator'])->name('administrator');
Route::post('/administrator/add', [App\Http\Controllers\AdminPuController::class, 'addadministrator'])->name('addadministrator');

// lapangan auth route
Route::post('/data-kk/add', [App\Http\Controllers\AdminLapanganController::class, 'adddatakk'])->name('adddatakk');
Route::post('/data-kk/update', [App\Http\Controllers\AdminLapanganController::class, 'updatedatakk'])->name('updatedatakk');
