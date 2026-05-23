<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FutsalController;

// Rute Navigasi Utama
Route::get('/', [FutsalController::class, 'index'])->name('futsal.index');
Route::get('/contact', [FutsalController::class, 'contact'])->name('futsal.contact');

// Rute Operasi Data Booking (CRUD)
Route::get('/jadwal', [FutsalController::class, 'jadwalIndex'])->name('futsal.jadwal');
Route::post('/jadwal', [FutsalController::class, 'store'])->name('futsal.store');
Route::get('/jadwal/{id}/edit', [FutsalController::class, 'edit'])->name('futsal.edit');
Route::put('/jadwal/{id}', [FutsalController::class, 'update'])->name('futsal.update');
Route::delete('/jadwal/{id}', [FutsalController::class, 'destroy'])->name('futsal.destroy');
