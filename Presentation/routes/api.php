<?php

use App\Http\Controllers\AddClientController;
use App\Http\Controllers\GetClientByIdController;
use App\Http\Controllers\GetCountClientController;
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

Route::get('/clients', [GetClientsController::class, 'get']);
Route::post('/clients', [AddClientController::class, 'add']);

Route::get('/clients/count', [GetCountClientController::class, 'get']);

