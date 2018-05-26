<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KostumKategori extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'kostum_kategori';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_kostum','id_kategori',
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


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kostum()
    {
        return $this->belongsTo(
        // Model
            'App\Models\Kostum',
            // Foreign key
            'id',
            // Other key
            'id_kostum'
        );
    }
    public function kategori()
    {
        return $this->belongsTo(
        // Model
            'App\Models\Kategori',
            // Foreign key
            'id',
            // Other key
            'id_kategori'
        );
    }
}
