<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Use App\Http\Controllers\Api\RegisterController;
Use App\Http\Controllers\Api\Info_valueController;
use App\Http\Controllers\Api\CategoryController;
Use App\Http\Controllers\Api\HistoricalController;
Use App\Http\Controllers\Api\AuthController;

//Route::post('/register', [RegisterController::class, 'store'])->name('api.v1.register');
Route::post('/register',[AuthController::class, 'register']);
Route::post('/login',[AuthController::class, 'login']);
//Route::get('logout', 'AuthController@logout')->middleware('auth');

Route::post('/logout',[AuthController::class, 'logout'])->middleware('auth:api');

//Route::post('register', [AuthController::class, 'register'])->name('api.v1.register.register');
Route::apiResource('categories', CategoryController::class)->names('api.v1.categories');
Route::apiResource('historicals', HistoricalController::class)->names('api.v1.historicals');

Route::apiResource('info_values', Info_valueController::class)->names('api.v1.info_values');

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
