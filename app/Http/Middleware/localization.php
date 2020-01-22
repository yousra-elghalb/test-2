<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class localization
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!empty(session("my_locale"))) {

            app()->setLocale(session('my_locale'));
            Log::error("hana : " . session('my_locale'));
        }

        Log::error(app()->getLocale());

        if (isset($request->lang) && !empty($request->lang)) {
            app()->setLocale($request->lang);
            session(['my_locale' => '' . $request->lang]);
            Log::error("walo" . session('my_locale'));
        }
        // continue request
        return $next($request);
    }
}
