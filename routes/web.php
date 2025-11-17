<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PengaduanController;

use App\Http\Controllers\MasyarakatController;

Route::resource('masyarakat', MasyarakatController::class);

Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/forgot-password', function () {
    return view('auth.passwords.email');
})->name('password.request');




Route::get('/pengaduan/tata-cara', function () {
    return view()->file(resource_path('views/pengaduan.tata_cara/create.blade.php'));
})->name('pengaduan.tata_cara');
// ...existing code...
// CRUD routes for pengaduan (pastikan controller punya semua metode)
Route::resource('pengaduan', PengaduanController::class);

