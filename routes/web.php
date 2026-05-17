<?php

use App\Http\Controllers\FutsalController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FutsalController::class, 'index'])->name('futsal.index');
Route::get('/jadwal', [FutsalController::class, 'jadwal'])->name('futsal.jadwal');
Route::post('/booking', [FutsalController::class, 'store'])->name('futsal.store');
Route::get('/tiket/{id}', [FutsalController::class, 'tiket'])->name('futsal.tiket');
Route::get('/contact', [FutsalController::class, 'contact'])->name('futsal.contact');
