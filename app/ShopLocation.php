<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopLocation extends Model
{
    protected $table = 'shop_location';
    protected $fillable =[
        'address',
        'city',
        'country',
        'location_lat',
        'location_lang',
    ];

    public function shop(){
        return $this->belongsTo('App\Shop');
    }
}
