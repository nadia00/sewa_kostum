<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'image', 'description', 'shop_id'];
//    protected $dates = ['created_at', 'updated_at'];

    public function shop()
    {
        return $this->belongsTo(
            'App\Shop',
            'shop_id',
            'id'
        );
    }
    
    public function orderProducts()
    {
        return $this->hasMany('App\OrderProduct');
    }

    public function productCategories()
    {
        return $this->hasMany('App\ProductCategory',"id", "product_id");
    }

    public function productImages()
    {
        return $this->hasMany('App\ProductImage');
    }

    public function productSizes()
    {
        return $this->hasMany('App\ProductSize');
    }

    public function productReview()
    {
        return $this->hasMany('App\ProductReview',"id","product_id");
    }
}
