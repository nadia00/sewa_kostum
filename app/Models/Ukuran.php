<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ukuran extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ukuran';


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['pivot'];


    /**
     * The attributes appended to the model's JSON form.
     *
     * @var array
     */
    protected $appends = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];



    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detailKostums()
    {
        return $this->hasMany(
            // Model
            'App\Models\DetailKostum',
            // Foreign key
            'id_ukuran',
            // Local key
            'id'
        );
    }
}
