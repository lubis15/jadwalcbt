<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LayananBackendController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [JadwalController::class, 'index']);
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/proses', [LoginController::class, 'proses'])->name('proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [LoginController::class, 'dashboard']);

    Route::get('/jadwalbackend', [LayananBackendController::class, 'jadwalbackend']);
    Route::post('/createJadwal', [LayananBackendController::class, 'createJadwal'])->name('createJadwal');
    Route::post('/jadwalbackend/update', [LayananBackendController::class, 'updateJadwal']);
    Route::get('/jadwalbackend/{id}', [LayananBackendController::class, 'getJadwalById']);
    Route::post('/deleteJadwal', [LayananBackendController::class, 'deleteJadwal']);
   
});
