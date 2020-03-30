<?php

use Illuminate\Support\Facades\App;
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

Route::get('/', ['as' => 'home', function () {
    return view('pages.home');
}]);
Route::get('/contact-me', ['as' => 'contact-me', function () {
    return view('pages.contact-me');
}]);
Route::get('/projects', ['as' => 'projects', function () {
    return view('pages.projects');
}]);
Route::get('/about-me', ['as' => 'about-me', function () {
    return view('pages.about-me');
}]);
if (config('app.env') == 'local') {
    Route::get('/info', function () {
        phpinfo();
    });
}

Route::get('/maintenance', function () {
    if (\Illuminate\Support\Facades\Request::query('key') !== 'post-deploy-callback') {
        abort('404');
    } else {
        \Illuminate\Support\Facades\Artisan::call('config:clear');
        \Illuminate\Support\Facades\Artisan::call('view:clear');
        \Illuminate\Support\Facades\Artisan::call('migrate');

        return response(
            '[' . \Illuminate\Support\Facades\Date::now()->toISOString() . ']'
            . ' Optimization & Migration completed'
        )->header('Content-TYpe', 'text/plain');
    }
});
