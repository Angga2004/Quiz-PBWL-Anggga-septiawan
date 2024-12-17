<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\GolonganController;


// Route untuk halaman umum (bebas diakses)
Route::get('/', function () {
    return view('login', ['title' => 'Login']);
})->name('root');

Route::get('/golongan', function () {
    return view('golongan', ['title' => 'golongan']);
});
Route::get('/pelanggan', function () {
    return view('pelanggan', ['title' => 'pelanggan']);
});


// Middleware untuk pengguna yang belum login (guest)
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

// Middleware untuk pengguna yang sudah login (auth)

Route::get('/home', function () {
    return view('home', ['title' => 'Home']);
})->name('home');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
;

Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan.index');
    Route::get('/pelanggan/tambah', [PelangganController::class, 'create'])->name('pelanggan.create');
    Route::post('/pelanggan/tambah', [PelangganController::class, 'store'])->name('pelanggan.store');
    Route::get('/pelanggan/edit/{id}', [PelangganController::class, 'edit'])->name('pelanggan.edit');
    Route::put('/pelanggan/edit/{id}', [PelangganController::class, 'update'])->name('pelanggan.update');
    Route::get('/pelanggan/hapus/{id}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy');

Route::resource('golongan', GolonganController::class);
Route::get('/golongan', [GolonganController::class, 'index'])->name('golongan.index');
Route::get('/golongan/create', [GolonganController::class, 'create'])->name('golongan.create');
Route::post('/golongan', [GolonganController::class, 'store'])->name('golongan.store');
Route::get('/golongan/{id}/edit', [GolonganController::class, 'edit'])->name('golongan.edit');
Route::put('/golongan/{id}', [GolonganController::class, 'update'])->name('golongan.update');
Route::delete('/golongan/{id}', [GolonganController::class, 'destroy'])->name('golongan.destroy');