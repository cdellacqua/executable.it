<?php
/**
 * Created by PhpStorm.
 * User: carlones
 * Date: 14/03/20
 * Time: 10:45
 */

namespace App\Http\View\Composers;


use App\Models\SEO;
use Illuminate\Support\Facades\Request;
use Illuminate\View\View;

class SEOComposer
{
    public function __construct()
    {

    }

    public function compose(View $view)
    {
        $view->with(
            'seo',
            SEO::query()
                ->where('path', Request::path())
                ->where('locale', app()->getLocale())
                ->firstOrNew([], [
                    'path' => Request::path(),
                    'locale' => app()->getLocale(),
                    'og_type' => 'website',
                    'og_url' => Request::fullUrl(),
                    'robots' => null,
                    'author' => 'Carlo Dell\'Acqua',
                    'keywords' => __('consulenza,software,sviluppo,development,developer,siti,web,webapp,informatica,landing,page,form,programmazione,programmatore'),
                    'title' => 'Executable',
                    'description' => __('Servizi di consulenza informatica e realizzazione di applicativi Web')
                ])
        );
    }
}
