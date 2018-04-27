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
 * Class Toko
 * @package App\Models
 *
 * @property integer $id
 * @property integer $id_penjual
 * @property string $nama
 * @property string $motto
 * @property string $lokasi
 * @property string $telepon
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \App\Models\Kostum[] $kostums
 * @property \App\Models\Sewa[] $sewas
 * @property \App\Models\User $user
 */
class Toko extends Model 
{

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'toko';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_penjual','nama', 'motto', 'telepon','lokasi',
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
	public function kostums()
	{
		return $this->hasMany(
			// Model
			'App\Models\Kostum',
			// Foreign key
			'id_toko',
			// Local key
			'id'
		);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function sewas()
	{
		return $this->hasMany(
			// Model
			'App\Models\Sewa',
			// Foreign key
			'id_toko',
			// Local key
			'id'
		);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user()
	{
		return $this->belongsTo(
			// Model
			'App\Models\User',
			// Foreign key
			'id',
			// Other key
			'id_penjual'
		);
	}



}
