<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Item;


class ItemController extends Controller
{

    public function index()
    {
        return Item::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'weight' => 'required|max:255'
        ]);

        $item = Item::create($data);

        return response(
            [
                'item' => $item,
                'message' => 'Item succesfully created' 
            ]
            , 201 );
    }

    public function update(Request $request, $itemId)
    {
        $item = Item::find($itemId);

        $data = $request->validate([
            'name' => 'required|max:255',
            'weight' => 'required|max:255'
        ]);

        $item->update($data);

        return response([
            'message' => 'Item succesfully updated'
        ], 200);
    }


    public function delete($itemId)
    {
        $item = Item::find($itemId);

        $item->delete();

        return response([
            'message' => 'Item succesfully deleted'
        ], 200);
    }
}
