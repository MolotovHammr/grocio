<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Catalogue extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'description'
    ];

    /**
     * @return HasMany<Item>
     */
    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
