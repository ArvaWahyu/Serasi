<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SerasiController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;

Route::get('/admin/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('admin.dashboard');

// Halaman depan
Route::get('/', [SerasiController::class, 'index']);
Route::post('/serasi', [SerasiController::class, 'store'])->name('serasi.store');

// Admin (gunakan middleware auth jika perlu)
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/serasi', [SerasiController::class, 'indexAdmin'])->name('serasi.index');
    Route::get('/serasi/create', [SerasiController::class, 'create'])->name('serasi.create');
    Route::post('/serasi', [SerasiController::class, 'storeAdmin'])->name('serasi.store');
    Route::get('/serasi/{id}/edit', [SerasiController::class, 'edit'])->name('serasi.edit');
    Route::put('/serasi/{id}', [SerasiController::class, 'update'])->name('serasi.update');
    Route::delete('/serasi/{id}', [SerasiController::class, 'destroy'])->name('serasi.destroy');
    Route::resource('users', UserController::class);
});

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

use App\Http\Controllers\MessageController;

Route::middleware(['auth'])->group(function () {
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
});
