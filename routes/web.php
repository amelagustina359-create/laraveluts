<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\TanggapanController;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

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

/*
| Contact (user) -> form and submit
*/
Route::get('/kontak', [ContactController::class, 'index'])->name('kontak');
Route::post('/kontak', [ContactController::class, 'store'])->name('kontak.send');

/*
| Admin: lihat dan hapus pesan
*/
Route::get('/admin/pesan', function () {
    $path = storage_path('app/contacts.json');
    $pesan = [];
    if (File::exists($path)) {
        $pesan = json_decode(File::get($path), true) ?: [];
        $pesan = array_reverse($pesan);
    }
    return view('admin.pesan_terkirim', compact('pesan')); // pastikan nama view sesuai file Anda
})->name('admin.pesan');

Route::post('/admin/pesan/hapus/{index}', function (Request $request, $index) {
    $path = storage_path('app/contacts.json');
    if (!File::exists($path)) {
        return redirect()->route('admin.pesan')->with('error', 'File pesan tidak ditemukan.');
    }
    $all = json_decode(File::get($path), true) ?: [];
    $all = array_reverse($all);
    if (!isset($all[$index])) {
        return redirect()->route('admin.pesan')->with('error', 'Pesan tidak ditemukan.');
    }
    array_splice($all, $index, 1);
    $all = array_reverse($all);
    File::put($path, json_encode($all, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE));
    return redirect()->route('admin.pesan')->with('success', 'Pesan berhasil dihapus.');
})->name('admin.pesan.delete');
