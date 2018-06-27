<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    protected $fillable = [
        'product_id',
        'size_id',
        'price',
        'quantity',
    ];

    public function product()
    {
        return $this->belongsTo(
            'App\Product',
            'product_id',
            'id'
        );
    }

    public function size()
    {
        return $this->belongsTo('App\Size');
    }
}
