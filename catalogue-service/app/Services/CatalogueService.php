<?php

namespace App\Services;

use App\Models\Catalogue;

class CatalogueService{
    
    public function show(Int $id): Catalogue
    {
        return Catalogue::with(['items' => function($q){
            $q->orderBy('name', 'asc');
        }])->findOrFail($id);
    }

    public function create(Array $itemData): Catalogue
    {
       return Catalogue::create($itemData);
    }
}