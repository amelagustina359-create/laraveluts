<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MasyarakatController;
use App\Http\Controllers\TanggapanController;
use App\Http\Controllers\PesanController;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

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


// Register routes (untuk pengguna yang belum punya akun)
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/forgot-password', function () {
    return view('auth.passwords.email');
})->name('password.request');

// Handle form submit: send password reset link
Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink($request->only('email'));

    return $status === Password::RESET_LINK_SENT
                ? back()->with('status', __($status))
                : back()->withErrors(['email' => __($status)]);
})->name('password.email');





Route::resource('pengaduan', PengaduanController::class);
Route::resource('tanggapan', TanggapanController::class);
// Admin routes for petugas (protected by auth middleware)
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/pengaduan', [PengaduanController::class, 'adminIndex'])->name('admin.pengaduan.index');
    Route::get('/tanggapan/create/{id}', [TanggapanController::class, 'createFor'])->name('tanggapan.createFor');
    Route::post('/tanggapan/store/{id}', [TanggapanController::class, 'storeFor'])->name('tanggapan.storeFor');
});

// halaman statis
Route::get('/about', function () {
    return view('about');
})->name('about');

/*
| Contact (user) -> form and submit
*/


Route::get('/kontak', [ContactController::class, 'showForm'])->name('kontak');
Route::post('/kontak', [ContactController::class, 'store'])->name('kontak.send');




/*
| Pesan (Admin)
*/

// Admin
Route::prefix('admin')->group(function () {
    Route::get('/pesan', [PesanController::class, 'index'])->name('admin.pesan');
    Route::get('/pesan/{id}/edit', [PesanController::class, 'edit'])->name('admin.pesan.edit');
    Route::put('/pesan/{id}', [PesanController::class, 'update'])->name('admin.pesan.update');
    Route::delete('/pesan/{id}', [PesanController::class, 'destroy'])->name('admin.pesan.destroy');
});


Route::post('/kirim-pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');
Route::get('/pesan-terkirim', [PengaduanController::class, 'index'])->name('pengaduan.index');




//  Route::post('/admin/pesan/hapus/{index}', function (Request $request, $index) {
//      $path = storage_path('app/contacts.json');
//  if (!File::exists($path)) {
//           return redirect()->route('admin.pesan')->with('error', 'File pesan tidak ditemukan.');
//  }
//   $all = json_decode(File::get($path), true) ?: [];
//   $all = array_reverse($all);
//    if (!isset($all[$index])) {
//  return redirect()->route('admin.pesan')->with('error', 'Pesan tidak ditemukan.');
//     }
//     array_splice($all, $index, 1);
//    $all = array_reverse($all);
//    File::put($path, json_encode($all, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE));
//    return redirect()->route('admin.pesan')->with('success', 'Pesan berhasil dihapus.');
//  })->name('admin.pesan.delete');
