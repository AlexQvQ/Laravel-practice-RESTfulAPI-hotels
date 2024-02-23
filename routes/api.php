<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ChangeRoomController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RoomController;
use App\Http\Controllers\Api\HotelController;
use App\Http\Controllers\Api\ClientController;


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

Route::middleware('auth:sanctum')->apiResource('clients', ClientController::class);
Route::middleware('auth:sanctum')->apiResource('hotel', HotelController::class);
Route::middleware('auth:sanctum')->apiResource('room', RoomController::class)->except('index');
Route::middleware('auth:sanctum')->get('rooms', [RoomController::class, 'index']);
Route::middleware('auth:sanctum')->apiResource('room.clients', ChangeRoomController::class)->scoped();
// Route::get('room/{room}/clients/{client}', [RoomController::class, 'index']);
Route::middleware('auth:sanctum')->get('userinroom', [ChangeRoomController::class, 'index']);
Route::middleware('auth:sanctum')->apiResource('hotel', HotelController::class)->except('index');
Route::middleware('auth:sanctum')->get('hotels', [HotelController::class, 'index']);

Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('logout', [AuthController::class, 'logout']);

