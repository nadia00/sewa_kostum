<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fine extends Model
{
    protected $table = 'fine';
    protected $fillable = [
        'shop_id',
        'order_id',
        'type_id',
        'sum_product',
        'total',
        ];
//    protected $dates = ['created_at', 'updated_at'];

    public function shop(){
        return $this->belongsTo('App\FineShop', 'shop_id','id');
    }
    public function fineType(){
        return $this->belongsTo('App\FineType', 'type_id','id');
    }
    public function order(){
        return $this->belongsTo('App\Order', 'order_id','id');
    }

}
