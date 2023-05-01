<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ScannerController;
use App\Http\Controllers\Api\DirectoryController;

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

// this returns a flatten array -- older version
Route::get('/display', [ScannerController::class, 'display'])->middleware('auth.basic');

// this returns a flatten array
Route::get('/iterate', [DirectoryController::class, 'iterate']);