<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fine extends Model
{
    protected $table = 'fine';
    protected $fillable = [
        'fine_shop_id',
        'order_id',
        'total',
        ];
//    protected $dates = ['created_at', 'updated_at'];

    public function fineShop(){
        return $this->belongsTo('App\FineShop', 'fine_shop_id','id');
    }
    public function order(){
        return $this->belongsTo('App\Order', 'order_id','id');
    }

}
