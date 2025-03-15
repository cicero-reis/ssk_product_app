<?php

use App\Http\Controllers\Api\V1\ProductCreateController;
use App\Http\Controllers\Api\V1\ProductDeleteController;
use App\Http\Controllers\Api\V1\ProductGetAllController;
use App\Http\Controllers\Api\V1\ProductGetByIdController;
use App\Http\Controllers\Api\V1\ProductUpdateController;
use App\Http\Controllers\Api\V1\ProductUploadFileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('/products', ProductGetAllController::class)->name('api.v1.products.all');;
    Route::get('/products/{id}', ProductGetByIdController::class)->name('api.v1.products.get');
    Route::post('/products', ProductCreateController::class)->name('api.v1.products.create');
    Route::put('/products/{id}', ProductUpdateController::class)->name('api.v1.products.update');;
    Route::delete('/products/{id}', ProductDeleteController::class)->name('api.v1.products.delete');
    Route::post('/products/{id}/upload', ProductUploadFileController::class)->name('api.v1.products.upload');
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
