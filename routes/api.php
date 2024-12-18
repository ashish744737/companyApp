<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CompanyApiController;
use App\Http\Controllers\API\EmployeeApiController;

Route::group([
    'middleware' => 'api',
], function ($router) {
    // Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');
    Route::post('/refresh', [AuthController::class, 'refresh'])->middleware('auth:api');
    Route::resource('companies', CompanyApiController::class)->middleware('auth:api');
    Route::resource('employees', EmployeeApiController::class)->middleware('auth:api');
});
