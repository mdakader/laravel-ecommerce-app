<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Backend\VendorProfileController;


/** Vendor Routes */
Route::get('dashboard', [VendorController::class, 'dashboard'])->middleware(['auth', 'role:vendor'])->name('dashboard');
Route::get('profile', [VendorProfileController::class, 'index'])->middleware(['auth', 'role:vendor'])->name('profile');
Route::put('profile', [VendorProfileController::class, 'updateProfile'])->middleware(['auth', 'role:vendor'])->name('profile.update'); // user.profile.update
Route::post('profile', [VendorProfileController::class, 'updatePassword'])->middleware(['auth', 'role:vendor'])->name('profile.update.password');
