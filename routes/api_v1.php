<?php

use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\AuthApiController;
use App\Http\Controllers\Api\V1\superAdmin\CategoryController;
use App\Http\Controllers\Api\V1\superAdmin\DynamicAttributeController;
use App\Http\Controllers\Api\V1\superAdmin\AdvertisementController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
// Auth
Route::post('/register', [AuthApiController::class, 'register']);
Route::post('/login', [AuthApiController::class, 'login']);
Route::post('/logout', [AuthApiController::class, 'logout'])->middleware('auth:sanctum');

// Super Admin
Route::middleware(['auth:sanctum', 'role:super-admin'])->prefix('super-admin/')->as('super-admin.')->group(function () {
    Route::apiResource('users', UserController::class);
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('dynamic-attributes', DynamicAttributeController::class);
    Route::get('advertisements', [AdvertisementController::class, 'advertisementsPending']);
    Route::get('advertisements/{advertisement}/approve', [AdvertisementController::class, 'approve']);
    Route::get('advertisements/{advertisement}/show', [AdvertisementController::class, 'show']);
    Route::get('advertisements/{advertisement}/reject', [AdvertisementController::class, 'reject']);
    Route::get('advertisementsApprove', [AdvertisementController::class, 'advertisementsApprove']);
    Route::get('advertisementsReject',[AdvertisementController::class,'advertisementsReject']);
});
