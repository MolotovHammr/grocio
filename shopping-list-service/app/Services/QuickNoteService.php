<?php

namespace App\Services;

use App\Models\QuickNote;

class QuickNoteService 
{
    public function create(array $requestData) 
    {
        $quickNote = QuickNote::create($requestData);
        
        return $quickNote;
    }

    public function update(array $requestData, int $id)
    {
        $quickNote = QuickNote::findOrFail($id);
        $quickNote::update($requestData);

        return $quickNote;
    }
}