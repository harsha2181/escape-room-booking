<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

use App\Http\Controllers\DashboardController;






Route::get('/', function () {
    return view('landing');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/booking', [BookingController::class, 'showForm'])->name('booking.form');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/booking/success', [BookingController::class, 'success'])->name('booking.success');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::patch('/booking/{booking}/cancel', [BookingController::class, 'cancel'])->name('booking.cancel')->middleware('auth');
// Show profile form
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');

// Update profile data
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');


require __DIR__.'/auth.php';
