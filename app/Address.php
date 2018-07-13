<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'user_id',
        'country',
        'city',
        'district',
        'street',
        'zip_code',
        'phone_number'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
