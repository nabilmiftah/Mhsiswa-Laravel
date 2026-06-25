<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

// Mengarahkan halaman utama langsung ke daftar mahasiswa
Route::get('/', function () {
    return redirect()->route('mahasiswa.index');
});

// Membuat route CRUD otomatis untuk mahasiswa
Route::resource('mahasiswa', MahasiswaController::class);