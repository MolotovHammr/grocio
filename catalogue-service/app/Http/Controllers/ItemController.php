<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Catalogue;
use App\Services\ItemService;
use Illuminate\Http\Response as HttpResponse;


class ItemController extends Controller
{

    public function index(ItemService $itemService): HttpResponse
    {
        try {
            $items = $itemService->index();

            return response(
                [
                    'items' => $items,
                ], 200);

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function indexByCatalogueId(ItemService $itemService, Catalogue $catalogue): HttpResponse
    {
        try {
            $items = $itemService->indexByCatalogueId($catalogue->id);

            return response(
                [
                    'items' => $items,
                ], 200);

        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function store(StoreItemRequest $request, Catalogue $catalogue,  ItemService $itemService): HttpResponse
    {
        try {
            $data = $request->validated();
            $item =$itemService->create($data);
    
            return response(
                [
                    'item' => $item,
                    'message' => 'Item succesfully created' 
                ], 201 );

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function show(Catalogue $catalogue, Int $itemId, ItemService $itemService): HttpResponse
    {
        try {
            $item = $itemService->show($itemId);

            return response(['item' => $item], 200 );

        } catch (\Throwable $th) {
            throw $th;
        }

    }

    public function update(UpdateItemRequest $request, Int $itemId, ItemService $itemService): HttpResponse
    {
        try {
            $data = $request->validated();
    
            $itemService->update($itemId, $data);
    
            return response(
                [
                    'message' => 'item succesfully updated'
                ], 200);

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function delete(Int $itemId, ItemService $itemService): HttpResponse
    {
        try {
            $itemService->delete($itemId);
    
            return response(['message' => 'item succesfully deleted'], 200);

        } catch (\Throwable $th) {
            throw $th;
        }

    }
}
