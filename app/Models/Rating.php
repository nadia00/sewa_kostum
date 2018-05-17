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
 * Class Rating
 * @package App\Models
 *
 * @property integer $id
 * @property integer $id_kostum
 * @property integer $id_sewa
 * @property integer $id_detail_bayar
 * @property double $nilai_rating
 * @property \Carbon\Carbon $tgl_rating
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \App\Models\DetailBayar $detailBayar
 * @property \App\Models\Kostum $kostum
 * @property \App\Models\Sewa $sewa
 */
class Rating extends Model 
{

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'rating';


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
	protected $dates = ['tgl_rating', 'created_at', 'updated_at'];



	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function detailBayar()
	{
		return $this->belongsTo(
			// Model
			'App\Models\DetailBayar',
			// Foreign key
			'id',
			// Other key
			'id_detail_bayar'
		);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function detailKostum()
	{
		return $this->belongsTo(
			// Model
			'App\Models\DetailKostum',
			// Foreign key
			'id',
			// Other key
			'id_kostum'
		);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function detailSewa()
	{
		return $this->belongsTo(
			// Model
			'App\Models\DetailSewa',
			// Foreign key
			'id',
			// Other key
			'id_sewa'
		);
	}



}
