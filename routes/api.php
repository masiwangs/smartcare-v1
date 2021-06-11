<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\OrderHistoryController;
use App\Http\Controllers\API\UserController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/me', [AuthController::class, 'me'])->middleware('auth:sanctum');

Route::get('/pesanan', [OrderController::class, 'index']);
Route::post('/pesanan', [OrderController::class, 'store']);
Route::get('/pesanan/{id}', [OrderController::class, 'show']);
Route::get('/pesanan/{id}/riwayat', [OrderHistoryController::class, 'index']);
Route::post('/pesanan/{id}/riwayat', [OrderHistoryController::class, 'store']);

Route::get('user', [UserController::class, 'index']);
Route::get('user/{id}', [UserController::class, 'show']);
Route::post('user/{id}', [UserController::class, 'update']);
Route::post('user/{id}/password', [UserController::class, 'changePassword']);