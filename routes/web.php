<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\FarmerController;
use App\Http\Controllers\HomepageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomepageController::class, 'index'])->name('homepage');

// FARMER ROUTES
Route::group(['middleware' => ['auth']], function () {
    // PRODUCTS
   Route::get('farmer/dashboard', [FarmerController::class, 'index'])->name('dashboard');
   Route::get('farmer/dashboard/products', [FarmerController::class, 'listProducts'])->name('dashboard.list-products');
   Route::post('farmer/dashboard/products', [FarmerController::class, 'storeProduct'])->name('dashboard.store-product');
   Route::get('farmer/dashboard/products/create', [FarmerController::class, 'createProduct'])->name('dashboard.create-product');
   Route::get('farmer/dashboard/products/{product}', [FarmerController::class, 'showProduct'])->name('dashboard.show-product');
   Route::get('farmer/dashboard/productBookings/{product}', [FarmerController::class, 'showProductBookings'])->name('dashboard.show-product-bookings');
   Route::patch('farmer/dashboard/products/{product}', [FarmerController::class, 'updateProduct'])->name('dashboard.update-product');
   Route::delete('farmer/dashboard/products/{product}', [FarmerController::class, 'deleteProduct'])->name('dashboard.delete-product');
   Route::get('farmer/dashboard/products/{product}/edit', [FarmerController::class, 'editProduct'])->name('dashboard.edit-product');

   // BOOKINGS
   Route::get('farmer/dashboard/bookings', [FarmerController::class, 'listBookings'])->name('dashboard.list-bookings');
   Route::get('farmer/dashboard/bookings/{booking}', [FarmerController::class, 'showBooking'])->name('dashboard.show-booking');

   // PROFILE
   Route::get('farmer/dashboard/profile', [FarmerController::class, 'profile'])->name('dashboard.profile');
   Route::post('farmer/dashboard/profile', [FarmerController::class, 'updateProfile'])->name('farmer.dashboard.update-profile');

});

// ADMIN ROUTES
Route::group(['middleware' => ['auth:admin']], function () {
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('admin/dashboard/farmers', [AdminController::class, 'listFarmers'])->name('admin.dashboard.farmers');
    Route::get('admin/dashboard/doctors', [AdminController::class, 'listDoctors'])->name('admin.dashboard.doctors');
    Route::get('admin/dashboard/doctors/create', [AdminController::class, 'create'])->name('admin.dashboard.create-doctor');
    Route::post('admin/dashboard/doctors', [AdminController::class, 'store'])->name('admin.dashboard.store-doctor');
    Route::get('admin/dashboard/doctors/{doctor}/edit', [AdminController::class, 'edit'])->name('admin.dashboard.edit-doctor');
    Route::patch('admin/dashboard/doctors/{doctor}', [AdminController::class, 'update'])->name('admin.dashboard.update-doctor');
    Route::delete('admin/dashboard/doctors/{doctor}', [AdminController::class, 'destroy'])->name('admin.dashboard.delete-doctor');
});

// DOCTOR ROUTES
Route::group(['middleware' => ['auth:doctor']], function () {
    Route::get('doctor/dashboard', [DoctorController::class, 'index'])->name('doctor.dashboard');
    Route::get('doctor/dashboard/products', [DoctorController::class, 'listProducts'])->name('doctor.dashboard.products');
    Route::get('doctor/dashboard/bookings', [DoctorController::class, 'listBookings'])->name('doctor.dashboard.bookings');
    Route::get('doctor/dashboard/products/{product}', [DoctorController::class, 'showProduct'])->name('doctor.dashboard.show-product');
    Route::get('doctor/dashboard/bookings/{booking}', [DoctorController::class, 'showBooking'])->name('doctor.dashboard.show-booking');
    Route::post('doctor/dashboard/products/book/{product}', [DoctorController::class, 'bookProduct'])->name('doctor.dashboard.book-product');
    // PROFILE
   Route::get('doctor/dashboard/profile', [DoctorController::class, 'profile'])->name('doctor.dashboard.profile');
   Route::post('doctor/dashboard/profile', [DoctorController::class, 'updateProfile'])->name('doctor.dashboard.update-profile');
});

require __DIR__.'/auth.php';
