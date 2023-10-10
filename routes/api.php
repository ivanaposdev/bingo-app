<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BingoController;

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

Route::post('auth', [AuthController::class, 'store']);
Route::post('auth/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('bingo/start', [BingoController::class, 'start']);
    Route::post('bingo/{bingo}', [BingoController::class, 'show']);
    Route::post('bingo/{bingo}/pick-a-ball', [BingoController::class, 'pick']);
    Route::post('bingo/{bingo}/mark/{letter}/{number}', [BingoController::class, 'mark']);
    Route::post('bingo/{bingo}/verify', [BingoController::class, 'verify']);
    Route::apiResource('bingo', BingoController::class);
});
