<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    // use HasFactory;
    protected $table = 'history';

    protected $fillable = [
        'id', 'id_table', 'table_name', 'id_user', 'action'
    ];

    protected $casts = [
        'updated_at' => 'datetime',
    ];

}
