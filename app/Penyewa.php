<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penyewa extends Model
{
    public $table = "penyewa";
    protected $fillable = [
        'email', 'username', 'password', 'telp', 'nama_depan', 'nama_belakang',
    ];
}
