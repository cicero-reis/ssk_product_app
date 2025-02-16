<?php

use App\Http\Controllers\ProductGetAllController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'api/products'], function () {
    Route::get('/', ProductGetAllController::class);
});
