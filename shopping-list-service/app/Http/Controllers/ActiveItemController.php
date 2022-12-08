<?php

namespace App\Http\Controllers;

use App\Services\ActiveItemService;
use Illuminate\Http\Request;

class ActiveItemController extends Controller
{
    public function create(Request $request, ActiveItemService $activeItemService)
    {
        try {
            $data = $request->validate();
            $activeItem = $activeItemService->create($data);

            return response(
                [
                    'activeItem' => $activeItem, 
                    'message' => 'Active item succesfully added' 
                ], 201 );
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function increase(int $id, ActiveItemService $activeItemService)
    {
        try {
            $activeItemService->increase($id);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function decrease(int $id, ActiveItemService $activeItemService)
    {
        try {
            $activeItemService->decrease($id);
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
