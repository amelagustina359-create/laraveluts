<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\TanggapanController;

Route::resource('masyarakat', MasyarakatController::class);

Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/forgot-password', function () {
    return view('auth.passwords.email');
})->name('password.request');

Route::get('/pengaduan/tata-cara', function () {
    return view()->file(resource_path('views/pengaduan.tata_cara/create.blade.php'));
})->name('pengaduan.tata_cara');

Route::resource('pengaduan', PengaduanController::class);
Route::resource('tanggapan', TanggapanController::class);

// halaman statis
Route::get('/about', function () {
    return view('about');
})->name('about');

// gunakan ContactController yang dibuat di bawah
Route::get('/kontak', [ContactController::class, 'index'])->name('kontak');
Route::post('/kontak', [ContactController::class, 'store'])->name('kontak.send');

// route admin untuk melihat pesan (membaca dari storage/contacts.json)
Route::get('/admin/pesan', function () {
    $path = storage_path('app/contacts.json');
    $pesan = [];
    if (file_exists($path)) {
        $json = file_get_contents($path);
        $pesan = json_decode($json, true) ?? [];
    }
    return view('admin.pesan', compact('pesan'));
})->name('admin.pesan');

Route::post('/kontak', [ContactController::class, 'store'])->name('kontak.store');
