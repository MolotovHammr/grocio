<?php

namespace App\Models;

use App\Models\Catalogue;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'price',
        'catalogue_id',
    ];

    /**
     * @return BelongsTo<Catalogue, Item>
     */
    public function catalogue()
    {
        return $this->belongsTo(Catalogue::class, 'catalogue_id');
    }
}


