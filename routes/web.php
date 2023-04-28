<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ScannerController;
use App\Http\Controllers\Api\DirectoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('index');
});

// First version of the API
Route::post('/filebrowser', [ScannerController::class, 'store'])->middleware('auth.basic');

// Second version with SPLFileInfo fn / Data Display needs to be changed!
Route::post('/filebrowser', [DirectoryController::class, 'iterate']);
