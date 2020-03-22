<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SEO extends Model
{
    protected $table = 'seo';
    protected $fillable = [
        'path',
        'og_type',
        'og_url',
        'og_image',
        'twitter_card',
        'robots',
        'author',
        'keywords',
        'title',
        'description'
    ];
}
