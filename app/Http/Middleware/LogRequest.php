<?php

namespace App\Http\Middleware;

use App\Models\Log;
use Carbon\Carbon;
use Closure;

class LogRequest
{
    /** @var Carbon */
    protected static $requestStart;

    /**
     * Store the request start timestamp
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        self::$requestStart = Carbon::now();
        return $next($request);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function terminate($request)
    {
        Log::query()->create([
            'remote_address' => $request->getClientIp(),
            'session' => session()->getId(),
            'http_version' => $request->getProtocolVersion(),
            'method' => $request->method(),
            'url' => $request->fullUrl(),
            'headers' => $request->headers->all(),
            'locale' => app()->getLocale(),
            'processing_time_ms' => Carbon::now()->diffInMilliseconds(self::$requestStart),
        ]);
    }
}
