<?php

use App\Http\Controllers\API\V1\InvoicesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\CustomerController;

/*
https://www.youtube.com/watch?v=YGqCZjdgJJk
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



//api /v1
Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\API\V1', 'middleware' => 'auth:sanctum'], function () {
    Route::apiResource('customers', CustomerController::class);
    Route::apiResource('invoices', InvoicesController::class);

    Route::post('invoices/bulk', [InvoicesController::class, 'bulkStore']);
});