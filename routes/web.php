<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\FlashSaleController;
use App\Http\Controllers\Frontend\UserDashboardController;
use App\Http\Controllers\Frontend\FrontendProductController;
use App\Http\Controllers\Frontend\UserProfileController;
use App\Http\Controllers\Frontend\UserAddressController;
use App\Http\Controllers\Frontend\CartController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('flash-sale', [FlashSaleController::class, 'index'])->name('flash-sale');

/** Product details */
Route::get('product-detail/{slug}', [FrontendProductController::class, 'showProduct'])->name('product-detail');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

/** Admin Login Routes*/
Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');

/** Cart routes */
Route::post('add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');

Route::group(['middleware' => ['auth', 'verified'], 'prefix'=> 'user', 'as'=>'user.'], function()
{
    Route::get('dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('profile', [UserProfileController::class, 'index'])->name('profile');
    Route::put('profile', [UserProfileController::class, 'updateProfile'])->name('profile.update'); // user.profile.update
    Route::post('profile', [UserProfileController::class, 'updatePassword'])->name('profile.update.password');

    /** User Address Route */
    Route::resource('address', UserAddressController::class);
});
