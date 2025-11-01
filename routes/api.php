<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\CateringPackageController;
use App\Http\Controllers\Api\CateringSubscriptionController;
use App\Http\Controllers\Api\CateringTestimonialController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/catering-packages/{cateringPackage:slug}', [CateringPackageController::class, 'show']);
Route::get('/catering-packages', [CateringPackageController::class, 'class']);

Route::get('/filters/catering-packages', [CategoryController::class, 'filterPackages']);

Route::get('/category/{category:slug}', [CategoryController::class, 'show']);
Route::apiResource('/categories', CategoryController::class);

Route::get('/cities/{city:slug}', [CityController::class, 'show']);
Route::apiResource('/cities', CityController::class);

Route::apiResource('/testimonials', CateringTestimonialController::class);

Route::post('/booking-transaction', [CateringSubscriptionController::class, 'store']);
Route::post('/check-booking' , [CateringSubscriptionController::class, 'booking_details']);
