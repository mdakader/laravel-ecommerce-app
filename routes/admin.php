<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\AdminController;


/** Admin Routes */
Route::get('dashboard', [AdminController::class, 'dashboard'])->middleware(['auth', 'role:admin'])->name('admin.dashboard');
