<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FactSale extends Model
{
    protected $table = 'fact_sales';

    protected $primaryKey = 'sale_id';

    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'customer_id',
        'time_id',
        'quantity',
        'unit_price',
        'total_price',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(
            DimProduct::class,
            'product_id',
            'product_id'
        );
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(
            DimCustomer::class,
            'customer_id',
            'customer_id'
        );
    }

    public function time(): BelongsTo
    {
        return $this->belongsTo(
            DimTime::class,
            'time_id',
            'time_id'
        );
    }
}
