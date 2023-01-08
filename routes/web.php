<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'city'], function () {
    Route::get('/', [\App\Http\Controllers\CitiesController::class, 'index'])->name('cities.index');
    Route::get('/create', [\App\Http\Controllers\CitiesController::class, 'create'])->name('cities.create');
    Route::post('/', [\App\Http\Controllers\CitiesController::class, 'store'])->name('cities.store');
    Route::get('edit/{id}', [\App\Http\Controllers\CitiesController::class, 'edit'])->name('cities.edit');
    Route::put('update/{id}', [\App\Http\Controllers\CitiesController::class, 'update'])->name('cities.update');
    Route::delete('/delete/{id}', [\App\Http\Controllers\CitiesController::class, 'delete'])->name('cities.delete');
});
