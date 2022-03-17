<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\CategoryController;
Use App\Http\Controllers\Api\RegisterController;
Use App\Http\Controllers\Api\ValueController;
Use App\Http\Controllers\Api\Info_valuesController;
//Grupo 08: App informacion del tipo de cambio Dolar/Euro en Peru con historial

Route::post('/register', [RegisterController::class, 'store'])->name('api.v1.register');



Route::apiResource('categories', CategoryController::class)->names('api.v1.categories');
Route::apiResource('values', ValueController::class)->names('api.v1.values');
Route::apiResource('info_values', Info_valuesController::class)->names('api.v1.info_value');

/* Route::get('values', [ValueController::class, 'index'])->name('api.v1.values.index');
Route::post('values', [ValueController::class, 'store'])->name('api.v1.values.store');
Route::get('values/{value}', [ValueController::class, 'show'])->name('api.v1.cvalues.show');
Route::put('values/{value}', [ValueController::class, 'update'])->name('api.v1.values.update');
Route::delete('values/{value}', [ValueController::class, 'destroy'])->name('api.v1.values.destroy'); */

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
