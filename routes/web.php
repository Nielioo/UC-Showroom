<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\OrderController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Route::resource('roles', RoleController::class);
    // Route::resource('users', UserController::class);

    Route::resource('customers', CustomerController::class);
    Route::resource('kendaraans', KendaraanController::class);
    Route::resource('orders', OrderController::class);
});
