<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('do_login', [LoginController::class, 'do_login'])->name('do_login');


Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('admin/do_login', [AdminController::class, 'do_login'])->name('admin.do_login');

Route::group(['middleware' => 'admin_auth'], function () {

    Route::get('admin/dashbord', [AdminController::class, 'dashbord'])->name('admin_dashbord');
    Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
});

Route::group(['middleware' => 'user_auth'], function () {
    Route::get('dashbord', [LoginController::class, 'dashbord'])->name('dashbord');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});
