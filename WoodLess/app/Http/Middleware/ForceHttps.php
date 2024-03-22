<?php

namespace App\Http\Middleware;

use Closure;

class ForceHttps
{
    public function handle($request, Closure $next)
    {
        if (!$request->secure() && strpos($request->getRequestUri(), '/admin-panel/inventory/product-edit/') !== false) {
            return redirect()->secure($request->getRequestUri());
        }

        return $next($request);
    }
}
