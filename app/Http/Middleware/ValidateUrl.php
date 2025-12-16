<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateUrl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $url = $request->input('img_url');

        if ($url) {
            // Basic URL validation
            if (! filter_var($url, FILTER_VALIDATE_URL)) {
                return redirect('/')->with('error', 'La URL proporcionada no es válida.');
            }

            // Enforce http(s) scheme
            $scheme = parse_url($url, PHP_URL_SCHEME);
            if (! in_array($scheme, ['http', 'https'])) {
                return redirect('/')->with('error', 'La URL debe usar http o https.');
            }
        }

        return $next($request);
    }
}
