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
        return $this->belongsTo('App\Size', 'size_id', 'id');
    }

    public function cartStorage()
    {
        return $this->hasMany('App\CartStorage');
    }

    function stock($id){
        $size = 0;
        $product = ProductSize::where('id','=',$id)->first();
        $allorder = OrderProduct::all()->where('product_size_id','=',$id)->whereIn('order.status',[1,2, 0]);
        foreach ($allorder as $val){
            $size += $val->quantity;
        }
        return ((int)$product->quantity - (int)$size);
    }

}
