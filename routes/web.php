<?php

use App\Http\Controllers\HomeController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Default locale redirect for crawlers
Route::get('/', function () {
    return redirect(route_locale('home'), 301);
});

Route::prefix('{locale}')
    ->where(['locale' => implode('|', config('app.locales'))])
    ->middleware(\App\Http\Middleware\RouteLocale::class)
    ->group(function () {
        Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

        Route::get('/contacts', ['as' => 'contacts', 'uses' => 'ContactController@index']);
        Route::post('/contacts', ['as' => 'contacts', 'uses' => 'ContactController@store']);
        Route::get('/contacts-tp', ['as' => 'contacts-tp', 'uses' => 'ContactController@tp']);

        Route::get('/about-me', ['as' => 'about-me', 'uses' => 'AboutController@index']);

        Route::get('/cookies', ['as' => 'cookies', 'uses' => 'PrivacyController@cookies']);
        Route::get('/privacy', ['as' => 'privacy', 'uses' => 'PrivacyController@privacy']);
        Route::get('/licenses', ['as' => 'licenses', 'uses' => 'LicenseController@licenses']);
    });

// Development and Debug routes
if (config('app.env') == 'local') {
    Route::get('/info', function () {
        phpinfo();
    });

    Route::get('/{errorCode}', function ($errorCode) {
        abort(intval($errorCode));
    })->where('errorCode', '\d{3,3}');

    Route::get('/mail', function () {
        /** @var \App\Models\Contact $contact */
        $contact = \App\Models\Contact::query()->firstOrFail();
        return new \App\Email\ContactEmail($contact);
    });
}

// Support shared hosting
Route::get('/maintenance', function () {
    if (\Illuminate\Support\Facades\Request::query('key') !== config('maintenance.key')) {
        abort(404);
    } else {
        return view('maintenance');
    }
});

Route::post('/maintenance', function () {
    if (\Illuminate\Support\Facades\Request::post('key') !== config('maintenance.key')) {
        abort(404);
    } else {
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        Artisan::call('migrate');

        if (config('app.env') == 'local') {
            Artisan::call('db:seed --force');
        }

        return response(
            '[' . \Illuminate\Support\Facades\Date::now()->toISOString() . ']'
            . ' Cache cleared & Migration completed' . (config('app.env') == 'local' ? ' & Seed completed' : '')
        )->header('Content-TYpe', 'text/plain');
    }
});
