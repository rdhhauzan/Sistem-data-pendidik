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

Route::get('/dataguru', [App\Http\Controllers\DataGuruController::class, 'index']);
Route::post('/dataguru', [App\Http\Controllers\DataGuruController::class, 'store']);
Route::get('/dataguru/{id}', [App\Http\Controllers\DataGuruController::class, 'show']);
Route::put('/dataguru/{id}', [App\Http\Controllers\DataGuruController::class, 'update']);
Route::delete('/dataguru/{id}', [App\Http\Controllers\DataGuruController::class, 'destroy']);
