<?php

use App\Http\Controllers\APiController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->group(function () {

    Route::post('get-profile', [APiController::class, 'profile'])->name('get-profile');
    Route::post('logout', [APiController::class, 'logout'])->name('logout');
});




Route::post('login', [APiController::class, 'login'])->name('login');
