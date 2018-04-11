<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kostum extends Model
{
    public $table = "kostum";
    protected $fillable = [
        'nama', 'id_jasa', 'id_kategori', 'keterangan', 'harga', 'jumlah', 'stok',
    ];
}
