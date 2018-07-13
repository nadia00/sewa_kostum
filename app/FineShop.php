<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FineShop extends Model
{
    protected $table = 'fine_shop';
    protected $fillable = ['shop_id', 'type_id', 'price'];
//    protected $dates = ['created_at', 'updated_at'];

    public function shop(){
        return $this->belongsTo('App\Shop', 'shop_id','id');
    }
    public function fineType(){
        return $this->belongsTo('App\FineType', 'type_id','id');
    }

    public function fine(){
        return $this->hasMany('App\Fine','fine_shop_id','id');
    }
}
