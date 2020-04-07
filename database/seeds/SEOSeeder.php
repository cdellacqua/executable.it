<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SEOSeeder extends Seeder
{
    function row($locale, $path, $title, $keywords = null, $description = null) {
        $base = [
            'it' => [
                'og_type' => 'website',
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

        return array_merge($base[$locale], [
            'created_at' =>Carbon::create(2020, 4, 7),
            'locale' => $locale,
            'path' => $path,
            'title' => $title,
            'keywords' => $keywords ?? $base[$locale]['keywords'],
            'description' => $description ?? $base[$locale]['description'],
            'og_url' => config('app.url') . '/' . trim($path, '/'),
        ]);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seo')
            ->insert([
                $this->row('it', 'it', 'Executable'),
                $this->row('en', 'en', 'Executable'),

                $this->row('it', 'it/about-me', 'Chi sono', 'chi,sono,informazioni,io', __('Ho avuto esperienze in ambito di applicativi Desktop e Mobile, ho sperimentato con dispositivi embedded e mi sono dilettato in progetti basati su microcontrollori, fino ad arrivare all\'ambito Web che copre ormai la gran parte dei miei progetti.', [], 'it')),
                $this->row('en', 'en/about-me', 'About me', 'about,me,myself,experience', __('Ho avuto esperienze in ambito di applicativi Desktop e Mobile, ho sperimentato con dispositivi embedded e mi sono dilettato in progetti basati su microcontrollori, fino ad arrivare all\'ambito Web che copre ormai la gran parte dei miei progetti.', [], 'en')),

                $this->row('it', 'it/contacts', 'Contatti', 'contattami,contatti,informazioni,di,contatto', __('Se hai un\'idea che richiede una consulenza specialistica puoi contattarmi senza impegno compilando il seguente form o inviandomi un\'email all\'indirizzo riportato di seguito.', [], 'it')),
                $this->row('en', 'en/contacts', 'Contacts', 'contact,me', __('Se hai un\'idea che richiede una consulenza specialistica puoi contattarmi senza impegno compilando il seguente form o inviandomi un\'email all\'indirizzo riportato di seguito.', [], 'en')),

                $this->row('it', 'it/contacts-tp', 'Grazie', 'grazie', __('Grazie per avermi contattato', [], 'it')),
                $this->row('en', 'en/contacts-tp', 'Thank you', 'thank you', __('Grazie per avermi contattato', [], 'en')),

                $this->row('it', 'it/cookies', 'Cookie Policy', 'cookie,policy', __('Cosa sono e a cosa servono i cookie', [], 'it')),
                $this->row('en', 'en/cookies', 'Cookie Policy', 'cookie,policy', __('Cosa sono e a cosa servono i cookie', [], 'en')),

                $this->row('it', 'it/privacy', 'Privacy Policy', 'privacy,policy', __('Privacy Policy', [], 'it')),
                $this->row('en', 'en/privacy', 'Privacy Policy', 'privacy,policy', __('Privacy Policy', [], 'en')),

                $this->row('it', 'it/licenses', 'Licenze', 'licenze', __('Licenze', [], 'it')),
                $this->row('en', 'en/licenses', 'Licenses', 'licenze', __('Licenze', [], 'en')),
            ]);
    }
}
