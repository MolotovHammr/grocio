<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Item;

class ItemController extends Controller
{
    public function index(): Collection
    {
        try {
            return Item::all();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    // TODO: Look into meilisearch search for items
}
