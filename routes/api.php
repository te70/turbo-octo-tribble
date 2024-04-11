<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetailController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(DetailController::class)->group(function () {
    Route::post('/detail/store', 'store');
    Route::post('/detail/verify', 'verify');
});