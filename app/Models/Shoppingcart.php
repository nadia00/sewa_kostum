<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shoppingcart extends Model
{
    protected $table='shoppingcart';

    protected $fillable = [
        'id',
        'shop_id',
        'user_id',
        'product_id',
        'qty',
        'price',
//        'first_date',
//        'last_date',
    ];



    public function shops()
    {
        return $this->belongsTo('App\Shop');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function productSize()
    {
        return $this->belongsTo('App\ProductSize');
    }
}
