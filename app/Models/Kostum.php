<?php

namespace App\Models;

/*
 * !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 * THIS FILE IS AUTO-GENERATED BY AUTOMODEL:TABLE COMMAND
 * ANY CHANGES MADE TO THIS FILE MAY BE LOST
 * !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
 */

use Illuminate\Database\Eloquent\Model;

/**
 * No description found in the table comment.
 *
 * Class Kostum
 * @package App\Models
 *
 * @property integer $id
 * @property integer $id_kategori
 * @property integer $id_toko
 * @property string $nama
 * @property string $deskripsi
 * @property integer $harga
 * @property integer $jumlah_keseluruhan
 * @property integer $jumlah_stok
 * @property integer $rating
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \App\Models\DetailSewa[] $detailSewas
 * @property \App\Models\HistoriSewa[] $historiSewas
 * @property \App\Models\KostumGambar[] $kostumGambars
 * @property \App\Models\Rating[] $ratings
 * @property \App\Models\Kategori $kategori
 * @property \App\Models\Toko $toko
 */
class Kostum extends Model 
{

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'kostum';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_kategori','id_toko', 'nama', 'deskripsi','harga','jumlah_keseluruhan','jumlah_stok',
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
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
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
	public function kostumGambars()
	{
		return $this->hasMany(
			// Model
			'App\Models\KostumGambar',
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

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function toko()
	{
		return $this->belongsTo(
			// Model
			'App\Models\Toko',
			// Foreign key
			'id',
			// Other key
			'id_toko'
		);
	}



}
