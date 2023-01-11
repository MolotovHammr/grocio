<?php

namespace App\Services;

use App\Models\Item;
use Illuminate\Database\Eloquent\Collection;

class ItemService
{
    public function index(): Collection
    {
        return Item::all();
    }

    public function indexByCatalogueId(Int $catalogueId): Collection
    {
        return Item::where('catalogue_id', $catalogueId)->get();
    }

    public function indexByGroupId(Int $groupId): Collection
    {
        return Item::where('group_id', $groupId)->get();
    }

    public function show(Int $id): Item
    {
        return Item::findOrFail($id);
    }

    public function create(Array $itemData): Item
    {
       return Item::create($itemData);
    }

    public function update(Int $itemId, Array $newItemData)
    {
        $item = Item::findOrFail($itemId);

        return $item->update($newItemData);
    }

    public function delete(Int $itemId)
    {
        $item = Item::findOrFail($itemId);

        return $item->delete();
    }
}