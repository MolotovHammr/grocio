<?php

namespace App\Services;

use App\Exceptions\ActiveItemExists;
use App\Models\ActiveItem;
use App\Models\Item;
use App\Models\ShoppingList;
use Carbon\Carbon;

class ActiveItemService
{
    public function addActiveItem(Array $request)
    {
        if(ActiveItem::where('shopping_list_id', $request['shopping_list_id'])->where('item_id', $request['item_id'])->exists())
        {
            throw new ActiveItemExists('Active item already exists');
        }


        $activeItem = new ActiveItem([
            'item_id' => $request['item_id'],
            'shopping_list_id' => $request['shopping_list_id'],
            'added_at' => Carbon::now(),
            'amount' => $request['amount']
        ]);

        // $shoppingList = ShoppingList::findOrFail($request['shopping_list_id']);
        // $item = Item::findOrFail($request['item_id']);

        // $activeItem->shoppingList()->associate($shoppingList);

        // $activeItem->item()->associate($item);
        $activeItem->save();

        return $activeItem;
    }

    public function increase(Int $id)
    {
        $activeItem = ActiveItem::findOrFail($id);
        $newAmount = $activeItem->amount + 1;

        $activeItem->amount = $newAmount;
        $activeItem->save();

        return $activeItem;
    }

    public function decrease(Int $id)
    {
        $activeItem = ActiveItem::findOrFail($id);
        $newAmount = $activeItem->amount - 1;

        if($newAmount == 0)
        {
            $activeItem->delete();
            return 0;
        }

        $activeItem->amount = $newAmount;
        $activeItem->save();

        return $activeItem;
    }

    public function remove(Int $id)
    {
        $activeItem = ActiveItem::findOrFail($id);
        $activeItem->delete();
        return 0;
    }
}