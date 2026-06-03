<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AlatController;
use App\Http\Controllers\PeminjamanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// eksport pdf
Route::get('/peminjamans/export-pdf', [PeminjamanController::class, 'exportPdf'])->name('peminjamans.export-pdf');

// Alat routes
Route::resource('alats', AlatController::class);

// Peminjaman routes
Route::resource('peminjamans', PeminjamanController::class);

require __DIR__.'/auth.php';
