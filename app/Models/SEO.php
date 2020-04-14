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
        'og_image_width',
        'og_image_height',
        'twitter_card',
        'robots',
        'author',
        'keywords',
        'title',
        'description'
    ];

    public function getOgImageAttribute() {
        return $this->og_image ?? asset('/img/og-image.png');
    }
    public function getOgImageHeightAttribute() {
        return $this->og_image_height ?? getimagesize(public_path().'/img/og-image.png')[1];
    }
    public function getOgImageWidthAttribute() {
        return $this->og_image_width ?? getimagesize(public_path().'/img/og-image.png')[0];
    }
    public function getTwitterCardAttribute() {
        return $this->twitter_card ?? 'summary_large_image';
    }
}
