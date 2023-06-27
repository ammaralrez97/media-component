<?php

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
Route::get('/', [\App\Http\Controllers\HomeController::class ,'index']);

Route::group(['prefix' => 'media', 'as' => 'media.'], function () {
    Route::post('upload', [\App\Http\Controllers\MediaController::class, 'upload'])->name('upload');
    Route::post('get', [\App\Http\Controllers\MediaController::class, 'get'])->name('get');
    Route::post('files', [\App\Http\Controllers\MediaController::class, 'files'])->name('files');
});