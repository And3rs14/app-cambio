<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('info_values/chart', [App\Http\Controllers\Api\Info_valueController::class, 'chart'])->name('info_values.chart');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/home', [App\Http\Controllers\Api\Info_valueController::class, 'index'])->name('home');



// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::resource('info_values', 'App\Http\Controllers\Api\Info_valueController');

Route::get('/ExportarDatos', [App\Http\Controllers\Api\Info_valueController::class, 'ExportarDatos']) ->name('/ExportarDatos');

Route::get('/exportarExcel', [App\Http\Controllers\Api\Info_valueController::class, 'exportarExcel']) ->name('/exportarExcel');

