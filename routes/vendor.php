<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Backend\VendorProfileController;
use App\Http\Controllers\Backend\VendorShopProfileController;
use App\Http\Controllers\Backend\VendorProductController;
use App\Http\Controllers\Backend\VendorProductImageGalleryController;
use App\Http\Controllers\Backend\VendorProductVariantController;
use App\Http\Controllers\Backend\VendorProductVariantItemController;
use App\Http\Controllers\Backend\VendorOrderController;

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

/** Products variant item route */
Route::get('products-variant-item/{productId}/{variantId}', [VendorProductVariantItemController::class, 'index'])->name('products-variant-item.index');
Route::get('products-variant-item/create/{productId}/{variantId}', [VendorProductVariantItemController::class, 'create'])->name('products-variant-item.create');
Route::post('products-variant-item', [VendorProductVariantItemController::class, 'store'])->name('products-variant-item.store');
Route::get('products-variant-item-edit/{variantItemId}', [VendorProductVariantItemController::class, 'edit'])->name('products-variant-item.edit');
Route::put('products-variant-item-update/{variantItemId}', [VendorProductVariantItemController::class, 'update'])->name('products-variant-item.update');
Route::delete('products-variant-item/{variantItemId}', [VendorProductVariantItemController::class, 'destroy'])->name('products-variant-item.destroy');
Route::put('products-variant-item-status', [VendorProductVariantItemController::class, 'chageStatus'])->name('products-variant-item.chages-status');


/** Orders route */
Route::get('orders', [VendorOrderController::class, 'index'])->name('orders.index');
Route::get('orders/show/{id}', [VendorOrderController::class, 'show'])->name('orders.show');
Route::get('orders/status/{id}', [VendorOrderController::class, 'orderStatus'])->name('orders.status');
