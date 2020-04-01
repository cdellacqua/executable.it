<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SEOSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $base = [
            'it' => [
                'og_type' => 'website',
                'og_url' => config('app.url'),
                'og_image' => asset('/img/og-image.png'),
                'og_image_width' => 638,
                'og_image_height' => 336,
                'twitter_card' => 'summary_large_image',
                'robots' => null,
                'author' => 'Carlo Dell\'Acqua',
                'keywords' => __('consulenza,software,sviluppo,development,developer,siti,web,webapp,informatica,landing,page,form,programmazione,programmatore', [], 'it'),
                'description' => __('Servizi di consulenza informatica e realizzazione di applicativi Web', [], 'it')
            ],
            'en' => [
                'og_type' => 'website',
                'og_url' => config('app.url'),
                'og_image' => asset('/img/og-image.png'),
                'og_image_width' => 638,
                'og_image_height' => 336,
                'twitter_card' => 'summary_large_image',
                'robots' => null,
                'author' => 'Carlo Dell\'Acqua',
                'keywords' => __('consulenza,software,sviluppo,development,developer,siti,web,webapp,informatica,landing,page,form,programmazione,programmatore', [], 'en'),
                'description' => __('Servizi di consulenza informatica e realizzazione di applicativi Web', [], 'en')
            ],
        ];

        DB::table('seo')
            ->insert([
                array_merge($base['it'], [
                    'locale' => 'it',
                    'path' => '/',
                    'title' => 'Executable',
                ]),
                array_merge($base['en'], [
                    'locale' => 'en',
                    'path' => '/',
                    'title' => 'Executable',
                ]),

                array_merge($base['it'], [
                    'locale' => 'it',
                    'path' => 'about-me',
                    'title' => 'Chi sono',
                ]),
                array_merge($base['en'], [
                    'locale' => 'en',
                    'path' => 'about-me',
                    'title' => 'About me',
                ]),

                array_merge($base['it'], [
                    'locale' => 'it',
                    'path' => 'contacts',
                    'title' => 'Contatti',
                ]),
                array_merge($base['en'], [
                    'locale' => 'en',
                    'path' => 'contacts',
                    'title' => 'Contact',
                ]),

                array_merge($base['it'], [
                    'locale' => 'it',
                    'path' => 'contacts-tp',
                    'keywords' => 'grazie',
                    'title' => 'Grazie',
                ]),
                array_merge($base['en'], [
                    'locale' => 'en',
                    'path' => 'contacts-tp',
                    'keywords' => 'thank you',
                    'title' => 'Thank you',
                ])
            ]);
    }
}
