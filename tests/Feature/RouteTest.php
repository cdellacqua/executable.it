<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class RouteTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Root path should redirect to the default locale
     *
     * @return void
     */
    public function testRootPath()
    {
        $response = $this->get('/');

        $response
            ->assertStatus(301)
            ->assertRedirect('/'.$this->app->getLocale());
    }

    /**
     * Unsupported locales should return 404
     *
     * @return void
     */
    public function testUnsupportedLocales()
    {
        $all = [
            'ar',
            'de',
            'en',
            'es',
            'fr',
            'it',
            'ja',
            'PO',
            'pt',
            'ru',
            'zh',
        ];

        $unsupportedLocales = array_filter($all, function ($locale) { return !in_array($locale, config('app.locales')); });

        foreach ($unsupportedLocales as $locale) {
            $this->get('/'.$locale)
                ->assertStatus(404);
        }
    }

    /**
     * Supported locales should return 200
     *
     * @return void
     */
    public function testSupportedLocales()
    {
        foreach (config('app.locales') as $locale) {
            $this->get('/'.$locale)
                ->assertStatus(200);
        }
    }
}
