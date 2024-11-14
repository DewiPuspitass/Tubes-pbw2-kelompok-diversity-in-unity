<?php
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rute untuk login dan register
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Menu
    Route::get('/menu', [MenuController::class, 'index'])->name('tampilMenu');
    Route::get('/tambahmenu', [MenuController::class, 'create'])->name('tambahMenu');
    Route::post('/tambahmenu', [MenuController::class, 'store'])->name('simpanMenu');
    Route::get('/edit_menu/{id}', [MenuController::class, 'edit'])->name('editMenu');
    Route::put('/update_menu/{id}', [MenuController::class, 'update'])->name('updateMenu');

    // Rute profil pengguna

    Route::get('/settings', [ProfileController::class, 'index'])->name('settings');
    Route::get('/edit_profile/{id}', [ProfileController::class, 'edit'])->name('editsettings');
    Route::put('/update_profile/{id}', [ProfileController::class, 'update'])->name('simpansettings');
    
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Menggunakan file auth.php untuk rute autentikasi lainnya
require __DIR__.'/auth.php';
