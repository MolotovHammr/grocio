<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
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

    public function indexByCatalogueId(ItemService $itemService, Int $catalogueId)
    {
        try {
            $items = $itemService->indexByCatalogueId($catalogueId);

            return response(
                [
                    'items' => $items,
                ], 200);

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function indexByGroupId(ItemService $itemService, Int $groupId)
    {
        try {
            $items = $itemService->indexByGroupId($groupId);

            return response(
                [
                    'items' => $items,
                ], 200);

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function store(StoreItemRequest $request, ItemService $itemService): HttpResponse
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

    public function show(Int $itemId, ItemService $itemService): HttpResponse
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
