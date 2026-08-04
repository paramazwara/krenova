<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $table = 't_kelurahan';

    protected $fillable = [
        'id', 'nama_kel'
    ];
}
