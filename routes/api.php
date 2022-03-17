<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\Info_valuesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Use App\Http\Controllers\Api\RegisterController;


//Grupo 08: App informacion del tipo de cambio Dolar/Euro en Peru con historial

Route::post('/register', [RegisterController::class, 'store'])->name('api.v1.register');


//Prescindible?
Route::apiResource('categories', CategoryController::class)->names('api.v1.categories');
//Usar
Route::apiResource('info_values', Info_valuesController::class)->names('api.v1.info_values');




// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
