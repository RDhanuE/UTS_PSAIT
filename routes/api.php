<?php

use App\Http\Controllers\API\V1\CompleteTaskController;
use App\Http\Controllers\API\V1\PerkuliahanController;
use App\Http\Controllers\API\V1\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::prefix('v1')->group(function() {
    Route::apiResource('/tasks', TaskController::class);
    Route::patch('tasks/{task}/complete', CompleteTaskController::class);
    Route::get('/perkuliahan', [PerkuliahanController::class, 'index']);
    Route::post('/perkuliahan', [PerkuliahanController::class, 'store']);
    Route::get('/perkuliahan/{nim}', [PerkuliahanController::class, 'show']);
    Route::post('/perkuliahan/{nim}/{kode_mk}', [PerkuliahanController::class, 'update']);    
    Route::delete('/perkuliahan/{nim}/{kode_mk}', [PerkuliahanController::class, 'destroy']);});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
