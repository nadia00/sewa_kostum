<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const STATUS_REJECTED = 0;
    const STATUS_CONFIRM = 1;
    const STATUS_SENDING = 2;
    const STATUS_RENTED = 3;
    const STATUS_RETURN = 4;
    const STATUS_DONE = 5;

    public $timestamps = true;
    protected $fillable = [
        'user_id',
        'shop_id',
        'addresses_id',
        'status',
        'beginning_date',
        'final_date'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id','id');
    }

    public function address()
    {
        return $this->belongsTo('App\Address');
    }

    public function orderProducts()
    {
        return $this->hasMany('App\OrderProduct','order_id','id');
    }

    public function shop()
    {
        return $this->belongsTo('App\Shop','shop_id','id');
    }

    public function statusText()
    {
        if ($this->status == self::STATUS_NEW) {
            return 'New';
        } elseif ($this->status == self::STATUS_CONFIRM) {
            return "Confirm";
        } elseif ($this->status == self::STATUS_PAYMENT) {
            return "Payment";
        } elseif ($this->status == self::STATUS_RENTED) {
            return "Rented";
        } elseif ($this->status == self::STATUS_RETURN) {
            return "Return";
        } elseif ($this->status == self::STATUS_DONE) {
            return "Done";
        } else {
            return 'New';
        }
    }

    public function subtotal()
    {
        $subtotal = 0;
        foreach ($this->orderProducts as $orderProduct) {
            $subtotal = $subtotal + $orderProduct->quantity * $orderProduct->price;
        }
        return number_format($subtotal);
    }

    public function items()
    {
        $items = 0;
        foreach ($this->orderProducts as $orderProduct) {
            $items = $items + $orderProduct->quantity;
        }
        return number_format($items);
    }
}
