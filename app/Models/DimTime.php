<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DimTime extends Model
{
    protected $table = 'dim_times';

    protected $primaryKey = 'time_id';

    public $timestamps = false;

    protected $fillable = [
        'transaction_date',
        'year',
        'month',
        'month_name',
        'quarter',
    ];

    public function sales(): HasMany
    {
        return $this->hasMany(
            FactSale::class,
            'time_id',
            'time_id'
        );
    }
}
