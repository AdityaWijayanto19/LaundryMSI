<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController; // <--- Wajib di-import
use Illuminate\Support\Facades\Route;

// Halaman Depan (Landing Page)
Route::get('/', function () {
    return view('welcome');
});

// --- BAGIAN PENTING: Ganti Closure function() dengan Controller ---
Route::get('/dashboard', [TransactionController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Group untuk yang sudah Login
Route::middleware('auth')->group(function () {
    
    // --- Route Transaksi Laundry (Simpan, Update Status, Hapus) ---
    Route::post('/transaction', [TransactionController::class, 'store'])->name('transaction.store');
    Route::patch('/transaction/{id}/status', [TransactionController::class, 'updateStatus'])->name('transaction.status');
    Route::delete('/transaction/{id}', [TransactionController::class, 'destroy'])->name('transaction.destroy');

    // --- Route Profile Bawaan Breeze ---
    // (Saya hapus AdminProfileController yang duplikat agar tidak error konflik)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';