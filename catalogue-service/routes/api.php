<?php

use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\ItemController;
use App\Jobs\PingJob;
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
    return 'Healthy catalogue-service';
});
Route::post('/items', [ItemController::class, 'store']);
Route::get('/items', [ItemController::class, 'index']);
Route::get('/items/catalogues/{catalogueId}', [ItemController::class, 'indexByCatalogueId']);   
Route::get('/items/{itemId}', [ItemController::class, 'show']);
Route::put('items/{itemId}', [ItemController::class, 'update']);
Route::delete('/items/{id}', [ItemController::class, 'delete']);  

Route::post('/catalogues', [CatalogueController::class, 'store']);
Route::get('/catalogues/{catalogueId}', [CatalogueController::class, 'show']);

Route::post('/catalogues', [CatalogueController::class, 'store']);
Route::get('/catalogues/{catalogueId}', [CatalogueController::class, 'show']);
Route::get('/catalogues/{catalogue}/items', [ItemController::class, 'indexByCatalogueId']);
Route::post('/catalogues/{catalogue}/items', [ItemController::class, 'store']);
Route::put('/catalogues/{catalogue}/items/{itemId}', [ItemController::class, 'update']);
Route::get('/catalogues/{catalogue}/items/{itemId}', [ItemController::class, 'show']);
Route::delete('/catalogues/{catalogueId}/items/{itemId}', [ItemController::class, 'delete']);

Route::get('/ping', function (){
    PingJob::dispatch();

});
