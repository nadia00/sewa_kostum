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

    public function cartStorage()
    {
        return $this->hasMany('App\CartStorage');
    }

    function stock($id){
        $size = 0;
        $product = ProductSize::where('id','=',$id)->first();
        $allorder = OrderProduct::all()->where('id','=',$id)->whereIn('order.status',[1,2]);
        foreach ($allorder as $val){
            $size += $val->quantity;
        }
        return $product->quantity-$size;
    }

}