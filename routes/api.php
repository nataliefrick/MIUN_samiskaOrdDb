<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WordsController;
use App\Http\Controllers\ChangesController;
use App\Http\Controllers\DownloadsController;
use App\Http\Controllers\AuthController;

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

Route::resource('words', WordsController::class);
Route::get('words/latest', [WordsController::class, 'getLastThreeEntries']);
Route::get('words/search/{searchTerm}', [WordsController::class, 'searchText']);
Route::get('words/filter/{searchTerm}', [WordsController::class, 'filterText']);

Route::resource('changes', ChangesController::class); // Adds all suggested changes to data
Route::resource('downloads', DownloadsController::class); //Adds all registered downloads

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::resource('/users', AuthController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
