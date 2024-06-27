<?php

use App\Http\Controllers\ContractorController;
use App\Models\Contractor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('contractor', ContractorController::class);
