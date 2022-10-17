<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Services\ItemService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response as HttpResponse;


class ItemController extends Controller
{

    public function index(): Collection
    {
        try {
            return Item::all();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function store(Request $request): HttpResponse
    {
        try {
            $data = $request->validate([
                'name' => 'required|max:255',
                'weight' => 'required|max:255'
            ]);
    
            $item = (new ItemService())->create($data);
    
            return response(
                [
                    'item' => $item,
                    'message' => 'Item succesfully created' 
                ], 201 );

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function show(Int $itemId): HttpResponse
    {

        try {
            $item = Item::query()->findOrFail($itemId);

            return response(
                [
                    'item' => $item, 
                ], 200 );

        } catch (\Throwable $th) {
            throw $th;
        }

    }

    public function update(Request $request, Int $itemId): HttpResponse
    {
        try {
            $item = Item::find($itemId);

            $data = $request->validate([
                'name' => 'required|max:255',
                'weight' => 'required|max:255'
            ]);
    
            $item->update($data);
    
            return response(
                [
                    'message' => 'item succesfully updated'
                ], 200);

        } catch (\Throwable $th) {
            throw $th;
        }

    }


    public function delete(Int $itemId): HttpResponse
    {
        try {
            $item = Item::find($itemId);

            $item->delete();
    
            return response(
                [
                'message' => 'item succesfully deleted'
                ], 200);

        } catch (\Throwable $th) {
            throw $th;
        }

    }
}
