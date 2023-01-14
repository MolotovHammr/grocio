<?php

namespace App\Services;

use App\Models\ShoppingList;


class ShoppingListService
{
    public function create(array $shoppingListData)
    {
        return ShoppingList::create($shoppingListData);
    }

    public function show(int $id): ShoppingList
    {
        return ShoppingList::findOrFail($id)->load('activeItems')->load('activeItems.item');
    }

    public function update(int $id, array $newShoppingList)
    {
        $shoppingList = ShoppingList::findOrFail($id);
        return $shoppingList->update($newShoppingList);
    }

    public function delete(int $id)
    {
        $shoppingList = ShoppingList::findOrFail($id);
        return $shoppingList->delete();
    }

}