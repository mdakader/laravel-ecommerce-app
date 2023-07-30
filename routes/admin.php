<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\ProfileController;


/** Admin Routes */
Route::get('dashboard', [AdminController::class, 'dashboard'])->middleware(['auth', 'role:admin'])->name('admin.dashboard');

/** Profile Routes*/
Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::post('profile/update', [ProfileController::class, 'updateProfile'])->name('admin.profile.update');
