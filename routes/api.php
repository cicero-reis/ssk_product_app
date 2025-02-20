<?php

use App\Http\Controllers\Api\V1\ProductCreateController;
use App\Http\Controllers\Api\V1\ProductDeleteController;
use App\Http\Controllers\Api\V1\ProductGetAllController;
use App\Http\Controllers\Api\V1\ProductGetByIdController;
use App\Http\Controllers\Api\V1\ProductUpdateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('/products', ProductGetAllController::class);
    Route::get('/products/{id}', ProductGetByIdController::class);
    Route::post('/products', ProductCreateController::class);
    Route::put('/products/{id}', ProductUpdateController::class);
    Route::delete('/products/{id}', ProductDeleteController::class);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
