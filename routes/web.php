<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CustomerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [\App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/car/create', [\App\Http\Controllers\CarController::class, 'create'])->name('car.create');
Route::get('/car/edit/{id}', [\App\Http\Controllers\CarController::class, 'edit'])->name('car.update');
Route::put('/car/edit/{id}', [\App\Http\Controllers\CarController::class, 'update']);
Route::get('/car/delete/{id}', [\App\Http\Controllers\CarController::class, 'destroy']);
Route::get('/customer', [\App\Http\Controllers\CustomerController::class, 'index'])->name('customer.index');
Route::get('/customer/edit/{id}', [\App\Http\Controllers\CustomerController::class, 'edit']);
Route::put('/customer/edit/{id}', [\App\Http\Controllers\CustomerController::class, 'update']);
Route::get('/customer/delete/{id}', [\App\Http\Controllers\CustomerController::class, 'destroy']);
Route::resource('/car', 'App\Http\Controllers\CarController');
Route::resource('/customer', 'App\Http\Controllers\CustomerController');


