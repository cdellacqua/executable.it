<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'message',
        'privacy_granted',
        'privacy_revoked'
    ];

    protected $dates = [
        'privacy_granted',
        'privacy_revoked'
    ];
}
