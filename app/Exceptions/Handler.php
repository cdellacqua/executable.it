<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        $locale = $request->getPreferredLanguage() ? Str::substr($request->getPreferredLanguage(), 0, 2) : null;
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

        return parent::render($request, $exception);
    }
}
