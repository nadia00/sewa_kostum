<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailKostum extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'detail_kostum';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_kostum','id_ukuran','harga','jumlah_keseluruhan','jumlah_stok',
    ];

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


    public function detailSewas()
    {
        return $this->hasMany(
            // Model
            'App\Models\DetailSewa',
            // Foreign key
            'id_kostum',
            // Local key
            'id'
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function historiSewas()
    {
        return $this->hasMany(
            // Model
            'App\Models\HistoriSewa',
            // Foreign key
            'id_kostum',
            // Local key
            'id'
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ratings()
    {
        return $this->hasMany(
        // Model
            'App\Models\Rating',
            // Foreign key
            'id_kostum',
            // Local key
            'id'
        );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ukurans()
    {
        return $this->belongsTo(
            // Model
            'App\Models\Ukuran',
            // Foreign key
            'id',
            // Local key
            'id_ukuran'
        );
    }

    public function kostums()
    {
        return $this->belongsTo(
            // Model
            'App\Models\Kostum',
            // Foreign key
            'id',
            // Local key
            'id_kostum'
        );
    }

}
