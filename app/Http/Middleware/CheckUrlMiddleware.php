<?php

namespace App\Http\Middleware;

use Closure;

class CheckUrlMiddleware
{
    public function handle($request, Closure $next)
    {
        return strpos($request->url, 'https://www.olx.ua/d/uk/obyavlenie/') === 0 ?
            $next($request) :
            response()->json([
                'error' => 'URL not suitable'
            ], 400);
    }
}
