<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ActiveItem extends Pivot
{
    use HasFactory;
    
    protected $table = 'active_items';

    public $fillable = [
        'added_at',
        'bougth_at',
        'amount'
    ];

    public function shoppingList()
    {
        return $this->belongsTo(ShoppingList::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
