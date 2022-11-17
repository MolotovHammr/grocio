<?php

namespace App\Services;

use App\Models\QuickNote;

class QuickNoteService 
{
    public function create(array $requestData) 
    {
        QuickNote::create($requestData);

    }
}