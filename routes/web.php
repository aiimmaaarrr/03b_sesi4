<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MahasiswaController; 
use App\Http\Controllers\MatakuliahController; 
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route Dashboard: Menampilkan statistik untuk Tugas Mandiri
Route::get('/dashboard', function () {
    $jml_mhs = \App\Models\Mahasiswa::count(); 
    $jml_mk = \App\Models\Matakuliah::count(); 
    
    return view('dashboard', compact('jml_mhs', 'jml_mk'));
})->middleware(['auth', 'verified'])->name('dashboard');

// Grup Middleware Auth: Mengamankan semua fitur yang butuh login
Route::middleware('auth')->group(function () {
    // Fitur Profil (Bawaan Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Fitur CRUD Mahasiswa & Matakuliah
    Route::resource('mahasiswa', MahasiswaController::class);
    Route::resource('matakuliah', MatakuliahController::class);
});

// Route khusus untuk hapus mahasiswa dengan pengamanan ganda
Route::delete('/mahasiswa/{mahasiswa}', [App\Http\Controllers\MahasiswaController::class, 'destroy'])
    ->middleware(['auth', 'check.email'])
    ->name('mahasiswa.destroy');

// Route resource lainnya (index, create, store, edit, update)
Route::resource('mahasiswa', App\Http\Controllers\MahasiswaController::class)->except(['destroy']);
require __DIR__.'/auth.php';