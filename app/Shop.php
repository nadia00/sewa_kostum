<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    const STATUS_PENDING = 0;
    const STATUS_APPROVED = 1;
    const STATUS_BANNED = 2;
    protected $fillable = [
        'id',
        'name',
        'user_id',
        'type_id',
        'city',
        'district',
        'country',
        'description',
        'image',
        'status'
    ];

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function type()
    {
        return $this->belongsTo('App\Type');
    }

    public function shopImages()
    {
        return $this->hasMany('App\ShopImgae');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public static function getStatuses()
    {
        return [
            self::STATUS_PENDING => 'PENDING',
            self::STATUS_APPROVED =>'APPROVED',
            self::STATUS_BANNED => 'BANNED'
        ];
    }
}
