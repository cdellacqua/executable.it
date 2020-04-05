<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

class RouteLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $locale = $request->segment(1, \app()->getLocale()) ? Str::substr($request->segment(1, \app()->getLocale()), 0, 2) : null;
        if ($locale && !in_array($locale, config('app.locales'))) {
            $locale = null;
        }

        if ($locale) {
            App::setLocale($locale);
            if (App::getLocale() === 'it') {
                setlocale(LC_ALL, 'it_IT.UTF8');
            } else {
                setlocale(LC_ALL, 'en_US.UTF8');
            }
        }

        return $next($request);
    }
}
