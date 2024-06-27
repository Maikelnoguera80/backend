<?php

/*use Illuminate\Http\Request;
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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/datos', [DataController::class, 'index']);
    Route::get('/datos/{id}', [DataController::class, 'show']);
    Route::post('/datos', [DataController::class, 'store']);
    Route::put('/datos/{id}', [DataController::class, 'update']);
    Route::delete('/datos/{id}', [DataController::class, 'destroy']);
});

