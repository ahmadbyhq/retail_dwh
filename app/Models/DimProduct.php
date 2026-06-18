<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DimProduct extends Model
{
    protected $table = 'dim_products';

    protected $primaryKey = 'product_id';

    public $timestamps = false;

    protected $fillable = [
        'product_code',
        'product_name',
        'category',
        'price',
    ];

    public function sales(): HasMany
    {
        return $this->hasMany(
            FactSale::class,
            'product_id',
            'product_id'
        );
    }
}
