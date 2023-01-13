<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShoppingListController;
use App\Http\Controllers\ActiveItemController;

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

Route::get('/health', function (Request $request){
    return 'Healthy Shopping List Service!';
});

Route::post('/shopping-lists', [ShoppingListController::class, 'create']);
Route::get('/shopping-lists/{id}', [ShoppingListController::class, 'show']);
Route::post('/shopping-lists/{id}/active-items', [ActiveItemController::class, 'addActiveItem']);

