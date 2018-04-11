<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gambar extends Model
{
    public $table = "gambar";
    protected $fillable = [
        'id_kostum', 'filename', 'filepath', 'gambar', 'size', 'tipe',
    ];
    public function kostum()
    {
        return $this->belongsTo('App\Kostum');
    }


}
