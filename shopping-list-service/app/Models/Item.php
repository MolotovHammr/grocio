<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;


   public $fillable = [
    'name',
    'quantity',
    'unit',
    'price',
    'catalogue_item_id',
    'shopping_list_id',
   ];

   public function shoppingList()
   {
    return $this->belongsToMany(ShoppingList::class)->using(ActiveItem::class);
   }
}
