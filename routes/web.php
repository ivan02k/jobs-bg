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

Route::get('/', [\App\Http\Controllers\JobsController::class, 'index'])->name('jobs.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('search', [\App\Http\Controllers\JobsController::class, 'search']);

Route::group(['prefix' => 'city'], function () {
    Route::get('/', [\App\Http\Controllers\CitiesController::class, 'index'])->name('cities.index');
    Route::get('/create', [\App\Http\Controllers\CitiesController::class, 'create'])->name('cities.create');
    Route::post('/', [\App\Http\Controllers\CitiesController::class, 'store'])->name('cities.store');
    Route::get('edit/{id}', [\App\Http\Controllers\CitiesController::class, 'edit'])->name('cities.edit');
    Route::put('update/{id}', [\App\Http\Controllers\CitiesController::class, 'update'])->name('cities.update');
    Route::delete('/delete/{id}', [\App\Http\Controllers\CitiesController::class, 'delete'])->name('cities.delete');
});
Route::group(['prefix' => 'position'], function () {
    Route::get('/', [\App\Http\Controllers\PositionsController::class, 'index'])->name('positions.index');
    Route::get('/create', [\App\Http\Controllers\PositionsController::class, 'create'])->name('positions.create');
    Route::post('/', [\App\Http\Controllers\PositionsController::class, 'store'])->name('positions.store');
    Route::get('edit/{id}', [\App\Http\Controllers\PositionsController::class, 'edit'])->name('positions.edit');
    Route::put('update/{id}', [\App\Http\Controllers\PositionsController::class, 'update'])->name('positions.update');
    Route::delete('/delete/{id}', [\App\Http\Controllers\PositionsController::class, 'delete'])->name('positions.delete');
});
Route::group(['prefix' => 'job'], function () {
    Route::get('/', [\App\Http\Controllers\JobsController::class, 'index'])->name('jobs.index');
    Route::get('/admin', [\App\Http\Controllers\JobsController::class, 'index_admin'])->name('jobs.index_admin');
    Route::get('/create', [\App\Http\Controllers\JobsController::class, 'create'])->name('jobs.create');
    Route::post('/', [\App\Http\Controllers\JobsController::class, 'store'])->name('jobs.store');
    Route::get('edit/{id}', [\App\Http\Controllers\JobsController::class, 'edit'])->name('jobs.edit');
    Route::put('update/{id}', [\App\Http\Controllers\JobsController::class, 'update'])->name('jobs.update');
    Route::delete('/delete/{id}', [\App\Http\Controllers\JobsController::class, 'delete'])->name('jobs.delete');
});
Route::group(['prefix' => 'company'], function () {
    Route::get('/', [\App\Http\Controllers\CompaniesController::class, 'index'])->name('companies.index');
    Route::get('/create', [\App\Http\Controllers\CompaniesController::class, 'create'])->name('companies.create');
    Route::post('/', [\App\Http\Controllers\CompaniesController::class, 'store'])->name('companies.store');
    Route::get('edit/{id}', [\App\Http\Controllers\CompaniesController::class, 'edit'])->name('companies.edit');
    Route::put('update/{id}', [\App\Http\Controllers\CompaniesController::class, 'update'])->name('companies.update');
    Route::delete('/delete/{id}', [\App\Http\Controllers\CompaniesController::class, 'delete'])->name('companies.delete');
});
