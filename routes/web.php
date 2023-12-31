<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\VehicleController;
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
    return view('customer');
});

Route::redirect('/', '/customer');
Route::resource('customer', CustomerController::class);
Route::resource('vehicle', VehicleController::class);
