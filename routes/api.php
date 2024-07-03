<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\ProductApiController;

Route::resource('/user', UserApiController::class);
Route::resource('/product', ProductApiController::class);