<?php

namespace App\Services;

use App\Models\ShoppingList;


class ShoppingListService
{
    public function create(array $shoppingListData)
    {
        return ShoppingList::create($shoppingListData);
    }

    public function get(int $id): ShoppingList
    {
        return ShoppingList::findOrFail($id);
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