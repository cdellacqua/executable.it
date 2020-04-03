<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'log';

    protected $fillable = [
        'remote_address',
        'session',
        'http_version',
        'method',
        'url',
        'headers',
        'locale',
        'processing_time_ms',
    ];

    protected $casts = [
        'headers' => 'array'
    ];
}
