<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\superAdmin\TestController;
use App\Http\Controllers\Web\AdvertisementController;
use App\Http\Controllers\Web\superAdmin\AdvertisementController as SuperAdminAdvertisementController;
use App\Http\Controllers\Web\superAdmin\DashboardController;
use App\Http\Controllers\Web\superAdmin\UserController;
use App\Http\Controllers\Web\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome');
Route::get('/account', [WelcomeController::class, 'account'])->name('account');

Route::middleware(['auth', 'role:super-admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('users', UserController::class);
    Route::get('/admins', [UserController::class, 'admins'])->name('super-admin.admins');

    // إضافة هذا السطر:
    Route::get('/advertisements/pending', [SuperAdminAdvertisementController::class, 'advertisementsPending'])->name('super-admin.advertisementsPending');
    Route::get('/advertisements/index', [SuperAdminAdvertisementController::class, 'index'])->name('super-admin.advertisements.index');

    Route::get('advertisements/{advertisement}/approve', [SuperAdminAdvertisementController::class, 'approve'])->name('super-admin.advertisements.approve');
    Route::get('advertisements/{advertisement}/show', [SuperAdminAdvertisementController::class, 'show'])->name('super-admin.advertisements.show');
    Route::get('advertisements/{advertisement}/reject', [SuperAdminAdvertisementController::class, 'reject'])->name('super-admin.advertisements.reject');
    Route::get('advertisementsApprove', [SuperAdminAdvertisementController::class, 'advertisementsApprove'])->name('super-admin.advertisementsApprove');
    Route::get('advertisementsReject', [SuperAdminAdvertisementController::class, 'advertisementsReject'])->name('super-admin.advertisementsReject');
});
// Public routes for categories and dynamic attributes
Route::get('/api/categories', [AdvertisementController::class, 'getCategories']);
Route::get('/api/categories/{categoryId}/dynamic-attributes', [AdvertisementController::class, 'getDynamicAttributesByCategory']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

    Route::resource('/advertisements', AdvertisementController::class)->only(['index', 'show', 'store', 'create'])->middleware('auth');




// Route::middleware(['auth', 'role:super-admin'])->group(function () {
//     Route::get('/admin/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
//     Route::resource('users', UserController::class);
//     Route::get('/admins', [UserController::class, 'admins'])->name('super-admin.admins');

//     // إضافة هذا السطر:
//     Route::get('/advertisements', [SuperAdminAdvertisementController::class, 'advertisementsPending'])->name('super-admin.advertisementsPending');

//     Route::get('advertisements/{advertisement}/approve', [SuperAdminAdvertisementController::class, 'approve']);
//     Route::get('advertisements/{advertisement}/show', [SuperAdminAdvertisementController::class, 'show']);
//     Route::get('advertisements/{advertisement}/reject', [SuperAdminAdvertisementController::class, 'reject']);
//     Route::get('advertisementsApprove', [SuperAdminAdvertisementController::class, 'advertisementsApprove']);
//     Route::get('advertisementsReject', [SuperAdminAdvertisementController::class, 'advertisementsReject']);
// });
// Public routes for categories and dynamic attributes
// Route::get('/api/categories', [AdvertisementController::class, 'getCategories']);
// Route::get('/api/categories/{categoryId}/dynamic-attributes', [AdvertisementController::class, 'getDynamicAttributesByCategory']);

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
// Route::middleware(['auth',])->group(function () {
//     Route::resource('/advertisements', AdvertisementController::class)->only(['index', 'show', 'store', 'create']);
// });

require __DIR__ . '/auth.php';
