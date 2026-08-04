<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogErrors extends Model
{
    protected $table = 'log_errors';

    protected $fillable = [
        'action', 'errors', 'user'
    ];
}
