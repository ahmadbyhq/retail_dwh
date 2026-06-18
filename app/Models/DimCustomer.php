<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DimCustomer extends Model
{
    protected $table = 'dim_customers';

    protected $primaryKey = 'customer_id';

    public $timestamps = false;

    protected $fillable = [
        'customer_code',
        'customer_name',
        'gender',
        'city',
    ];

    public function sales(): HasMany
    {
        return $this->hasMany(
            FactSale::class,
            'customer_id',
            'customer_id'
        );
    }
}
