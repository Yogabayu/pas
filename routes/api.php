<?php

use App\Http\Controllers\Admin\OfficeController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['namespace' => 'Api', 'prefix' => 'v1'], function () {
    Route::post('login', [AuthController::class, 'login'])->name('login');

    Route::middleware('auth:api')->group(function () {
        // // route admin
        Route::post('logout', [AuthController::class, 'destroy'])->name('logout');

        //office
        Route::get('office', [OfficeController::class, 'index']);
        Route::post('office', [OfficeController::class, 'store']);
        Route::put('office/{id}', [OfficeController::class, 'update']);
        Route::delete('office/{id}', [OfficeController::class, 'destroy']);

        //////// Route User \\\\\\\\\
        Route::group(['prefix' => 'user'], function () {
        });
    });
});
