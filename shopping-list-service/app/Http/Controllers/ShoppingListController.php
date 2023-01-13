<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShoppingListRequest;
use Illuminate\Http\Request;
use App\Services\ShoppingListService;
use Illuminate\Http\Response as HttpResponse;


class ShoppingListController extends Controller
{
    public function create( StoreShoppingListRequest $request, ShoppingListService $shoppingListService): HttpResponse
    {
        try {
            $data = $request->validated();
            $shoppingList = $shoppingListService->create($data);
            return response(
                [
                    'shoppingList' => $shoppingList,
                    'message' => 'Shopping list succesfully created' 
                ], 201 );
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function show( ShoppingListService $shoppingListService, $id): HttpResponse
    {
        try {
            $shoppingList = $shoppingListService->show($id);
            return response(
                [
                    'shoppingList' => $shoppingList,
                    'message' => 'Shopping list succesfully retrieved' 
                ], 200 );
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
