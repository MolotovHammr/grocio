<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'quantity',
        'unit',
        'energy',
        'total_fat',
        'saturated_fat',
        'total_carbohydrates',
        'sugars',
        'protein',
        'salt',
        'catalogue_id',
    ];

    public function catalogue()
    {
        return $this->belongsToMany(Catalogue::class, 'catalogue_id');
    }
}


