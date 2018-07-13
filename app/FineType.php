<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FineType extends Model
{
    protected $table = 'fine_type';
    protected $fillable = ['name'];
//    public $timestamps = true;
//    protected $dates = ['created_at', 'updated_at'];

    public function fineShop(){
        return $this->hasMany('App\FineShop','type_id','id');
    }
}
