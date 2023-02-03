<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('user')->group(function (){
    Route::post('register', [\App\Http\Controllers\Api\UserController::class, 'register']);

    Route::post('login', [\App\Http\Controllers\Api\UserController::class, 'login']);

    Route::get('get-info', [\App\Http\Controllers\Api\UserController::class, 'getInfo'])->middleware('auth:sanctum');

});

Route::prefix('zikir')->middleware('auth:sanctum')->group(function (){

    Route::post('add-count', [\App\Http\Controllers\Api\ZikirCountController::class, 'addCount']);
    Route::get('get-today', [\App\Http\Controllers\Api\ZikirCountController::class, 'getToday']);
    Route::get('get-top', [\App\Http\Controllers\Api\ZikirCountController::class, 'getTopForToday']);
    Route::get('get-zhuma', [\App\Http\Controllers\Api\ZikirCountController::class, 'getZhuma']);
    Route::post('add-goal', [\App\Http\Controllers\Api\ZikirCountController::class, 'addGoal']);

});