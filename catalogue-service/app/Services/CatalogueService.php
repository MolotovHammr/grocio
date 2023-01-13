<?php

namespace App\Services;

use App\Models\Catalogue;

class CatalogueService{
    
    public function show(Int $id): Catalogue
    {
        return Catalogue::findOrFail($id)->load('items');
    }

    public function create(Array $itemData): Catalogue
    {
       return Catalogue::create($itemData);
    }
}