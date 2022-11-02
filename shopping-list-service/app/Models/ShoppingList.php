<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingList extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'description',
        'group_id'
    ];

    public function items()
    {
        return $this->hasMany(Item::class)->using(ActiveItem::class);
    }
}
