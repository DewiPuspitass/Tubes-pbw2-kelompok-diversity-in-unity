<?php
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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

    // Profil pengguna
    Route::get('/settings', [ProfileController::class, 'index'])->name('settings');
    Route::get('/edit_profile/{id}', [ProfileController::class, 'edit'])->name('editsettings');
    Route::put('/update_profile/{id}', [ProfileController::class, 'update'])->name('simpansettings');
    
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Manage Users
    Route::get('/manage_users', [UserController::class, 'index'])->name('manage_user');
    Route::get('/manage_users/edit_users/{id}', [UserController::class, 'edit'])->name('edit_user');
    Route::put('/update_user/{id}', [UserController::class, 'update'])->name('update_user');
    Route::delete('/manage_users/hapus_users/{id}', [UserController::class, 'destroy'])->name('hapus_user');
    
    // Manage Role
    Route::get('/manage_roles', [RoleController::class, 'index'])->name('manage_role');
    Route::get('/manage_roles/create', [RoleController::class, 'create'])->name('create_roles');
    Route::post('/manage_roles/create', [RoleController::class, 'store'])->name('simpan_roles');
    Route::get('/manage_roles/edit_roles/{id}', [RoleController::class, 'edit'])->name('edit_roles');
    Route::put('/manage_roles/update_roles/{id}', [RoleController::class, 'update'])->name('update_roles');
    Route::delete('/manage_roles/hapus_roles/{id}', [RoleController::class, 'destroy'])->name('hapus_roles');
});

require __DIR__.'/auth.php';
