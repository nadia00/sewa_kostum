<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name'];
//    protected $dates = ['created_at', 'updated_at'];

    public function productCategories()
    {
        return $this->hasMany('App\ProductCategory');
    }

}
