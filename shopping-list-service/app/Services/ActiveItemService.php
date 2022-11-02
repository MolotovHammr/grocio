<?php

namespace App\Services;

use App\Models\ActiveItem;
use App\Models\Item;
use App\Models\ShoppingList;
use Carbon\Carbon;

class ActiveItemService
{
    public function create(Array $request)
    {
        $activeItem = new ActiveItem([
            'added_at' => Carbon::now(),
            'amount' => $request['amount']
        ]);

        $shoppingList = ShoppingList::findOrFail($request['shopping_list_id']);
        $item = Item::findOrFail($request['item_id']);

        $activeItem->shoppingList()->associate($shoppingList);

        $activeItem->item()->associate($item);
        $activeItem->save();

        return $activeItem;
    }

    public function increase(Int $id)
    {
        $activeItem = ActiveItem::findOrFail($id);
        $newAmount = $activeItem->amount + 1;

        $activeItem->amount = $newAmount;

        return $activeItem;
    }
}