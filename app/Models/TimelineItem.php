<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimelineItem extends Model
{
    protected $table = 'timeline';

    protected $fillable = [
        'date',
        'locale',
        'title',
        'description',
        'icon'
    ];

    protected $dates = [
        'date'
    ];
}
