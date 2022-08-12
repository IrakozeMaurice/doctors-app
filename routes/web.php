<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/farmer/dashboard', function () {
    return view('farmer.dashboard');
})->middleware(['auth'])->name('dashboard');

// ADMIN ROUTES
Route::group(['middleware' => ['auth:admin']], function () {
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('admin/dashboard/farmers', [AdminController::class, 'listFarmers'])->name('admin.dashboard.farmers');
    Route::get('admin/dashboard/doctors', [AdminController::class, 'listDoctors'])->name('admin.dashboard.doctors');
});

// DOCTOR ROUTES
Route::group(['middleware' => ['auth:doctor']], function () {
    Route::get('doctor/dashboard', [DoctorController::class, 'index'])->name('doctor.dashboard');
});

require __DIR__.'/auth.php';
