<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cart;

class OrderProduct extends Model
{
    protected $fillable = [
        'order_id',
        'product_size_id',
        'price',
        'quantity',
    ];

    public function order()
    {
        return $this->belongsTo('App\Order','order_id','id');
    }
    
    public function product()
    {
        return $this->belongsTo(
            'App\ProductSize',
            'product_size_id',
            'id'
            );
    }

    public static function store($order_id)
    {
        foreach (Cart::content() as $cart) {
            $cart = $cart->toArray() ;
            $cart['order_id'] = $order_id;
            $cart['product_id'] = $cart['id'];
            $cart['quantity'] = $cart['qty'];
            OrderProduct::create($cart);
        }
    }
}
