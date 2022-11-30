<?php

use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\ItemController;
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

Route::get('/health', function (){
    return 'Healthy';
});
Route::post('/items', [ItemController::class, 'store']);
Route::get('/items', [ItemController::class, 'index']);
Route::get('/items/{itemId}', [ItemController::class, 'show']);
Route::put('items/{itemId}', [ItemController::class, 'update']);
Route::delete('/items/{id}', [ItemController::class, 'delete']);  

Route::post('/catalogues', [CatalogueController::class, 'store']);
Route::get('/catalogues/{catalogueId}', [CatalogueController::class, 'show']);
