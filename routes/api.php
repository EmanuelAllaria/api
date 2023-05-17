<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\BookController as BookV1;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

      
Route::get('/books', 'App\Http\Controllers\Api\V1\BookController@index');
Route::post('/books', 'App\Http\Controllers\Api\V1\BookController@create');
Route::get('/books/{book}', 'App\Http\Controllers\Api\V1\BookController@show');
Route::put('/books/{book}', 'App\Http\Controllers\Api\V1\BookController@update');
Route::delete('/books/{book}', 'App\Http\Controllers\Api\V1\BookController@destroy');

// Route::post('login', [App\Http\Controllers\Api\LoginController::class, 'login']);