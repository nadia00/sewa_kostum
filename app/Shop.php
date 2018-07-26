<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    const STATUS_PENDING = 0;
    const STATUS_APPROVED = 1;
    const STATUS_BANNED = 2;
    protected $fillable = [
        'name',
        'user_id',
        'country',
        'city',
        'street',
        'description',
        'image',
        'phone',
        'deposit',
        'status'
    ];

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function shopImages()
    {
        return $this->hasMany('App\ShopImgae');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function order(){
        return $this->hasMany('App\Order');
    }

    public function cartStorage()
    {
        return $this->hasMany('App\CartStorage');
    }

    public function fineShop()
    {
        return $this->hasMany('App\FineShop');
    }
    public function fine()
    {
        return $this->hasMany('App\Fine');
    }
    public static function getStatuses()
    {
        return [
            self::STATUS_PENDING => 'PENDING',
            self::STATUS_APPROVED =>'APPROVED',
            self::STATUS_BANNED => 'BANNED'
        ];
    }
    public static function getDeposit($id_shop){
        $shop = Shop::all()->where('id','=',$id_shop)->first();
        if($shop->deposit == null){
            $shop->deposit = 0;
            return $shop->deposit;
        }
        else
            return $shop->deposit;
    }
}
