<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 't_kecamatan';

    protected $fillable = [
        'id', 'nama_kec'
    ];
}
