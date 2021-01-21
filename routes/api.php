<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BookController as APIBookController;
use App\Http\Controllers\API\PublisherController as APIPublisherController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('api')->group(function(){
  Route::get('/books', [APIBookController::class, 'index'])->middleware('api');
  Route::get('/books/{id}', [APIBookController::class, 'show'])->middleware('api');
  Route::post('/books', [APIBookController::class, 'store'])->middleware('api');
  Route::put('/books/{id}', [APIBookController::class, 'update'])->middleware('api');
  Route::delete('/books/{id}', [APIBookController::class, 'destroy'])->middleware('api');

  Route::get('/publishers', [APIPublisherController::class, 'index']);
});
