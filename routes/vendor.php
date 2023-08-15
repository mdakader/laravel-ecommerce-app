<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Backend\VendorProfileController;
use App\Http\Controllers\Backend\VendorShopProfileController;
use App\Http\Controllers\Backend\VendorProductController;
use App\Http\Controllers\Backend\VendorProductImageGalleryController;
use App\Http\Controllers\Backend\VendorProductVariantController;

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

/** Products variant route */
Route::get('products-variant/{productId}', [VendorProductVariantController::class, 'index'])->name('products-variant.index');
Route::get('products-variant/create/{productId}', [VendorProductVariantController::class, 'create'])->name('products-variant.create');
Route::post('products-variant', [VendorProductVariantController::class, 'store'])->name('products-variant.store');
Route::get('products-variant-edit/{variantId}', [VendorProductVariantController::class, 'edit'])->name('products-variant.edit');
Route::put('products-variant-update/{variantId}', [VendorProductVariantController::class, 'update'])->name('products-variant.update');
Route::delete('products-variant/{variantId}', [VendorProductVariantController::class, 'destroy'])->name('products-variant.destroy');
Route::put('products-variant/change-status', [VendorProductVariantController::class, 'changeStatus'])->name('products-variant.change-status');
