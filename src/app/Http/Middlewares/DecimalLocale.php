<?php
namespace Ejetar\DecimalLocale\Http\Middleware;

use Illuminate\Http\Request;

class DecimalLocale {
    public function handle(Request $request, $next, $scopeRequired = null) {
        if ($locale = $request->header('DecimalLocale'))
            app()->singleton('DecimalLocale', fn() => $locale);

        return $next($request);
    }
}
