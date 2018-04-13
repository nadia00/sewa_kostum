<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jasa extends Model
{
    public $table = "jasa";
    protected $fillable = [
        'email', 'username', 'password', 'telp', 'nama_jasa', 'nama_pemilik',
    ];
}
