<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreActiveItem;
use App\Services\ActiveItemService;
use Illuminate\Http\Request;

class ActiveItemController extends Controller
{
    public function addActiveItem(StoreActiveItem $request, ActiveItemService $activeItemService)
    {
        try {
            $data = $request->validated();
            $activeItem = $activeItemService->addActiveItem($data);

            return response(
                [
                    'activeItem' => $activeItem, 
                    'message' => 'Active item succesfully added' 
                ], 201 );
                
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function increase(Request $request, int $id, int $activeItemId, ActiveItemService $activeItemService)
    {
        try {
            $activeItemService->increase($activeItemId);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function decrease(int $id, int $activeItemId,ActiveItemService $activeItemService)
    {
        try {
            $activeItemService->decrease($activeItemId);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function remove(int $id, ActiveItemService $activeItemService)
    {
        try {
            $activeItemService->remove($id);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
