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
    'price'
   ];

   public function shoppingList()
   {
    return $this->belongsToMany(ShoppingList::class)->using(ActiveItem::class);
   }
}
