<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Backend\VendorProfileController;
use App\Http\Controllers\Backend\VendorShopProfileController;
use App\Http\Controllers\Backend\VendorProductController;
use App\Http\Controllers\Backend\VendorProductImageGalleryController;

/** Vendor Routes */
Route::get('dashboard', [VendorController::class, 'dashboard'])->name('dashboard');
Route::get('profile', [VendorProfileController::class, 'index'])->name('profile');
Route::put('profile', [VendorProfileController::class, 'updateProfile'])->name('profile.update'); // vendor.profile.update
Route::post('profile', [VendorProfileController::class, 'updatePassword'])->name('profile.update.password'); // vendor.profile.update.password

/** Vendor shop profile  */
Route::resource('shop-profile', VendorShopProfileController::class);

/** Product Routes */
Route::get('product/get-subcategories', [VendorProductController::class, 'getSubCategories'])->name('product.get-subcategories');
Route::get('product/get-child-categories', [VendorProductController::class, 'getChildCategories'])->name('product.get-child-categories');
Route::put('product/change-status', [VendorProductController::class, 'changeStatus'])->name('product.change-status');
Route::resource('products', VendorProductController::class);

/** Products image gallery route */
Route::get('products-image-gallery/{productId}', [VendorProductImageGalleryController::class, 'index'])->name('products-image-gallery.index');
Route::post('products-image-gallery', [VendorProductImageGalleryController::class, 'store'])->name('products-image-gallery.store');
Route::delete('products-image-gallery/{productId}', [VendorProductImageGalleryController::class, 'destroy'])->name('products-image-gallery.destroy');
