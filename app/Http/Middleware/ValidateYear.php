<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidateYear
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $year = $request->route('year') ?? $request->input('year');
        
        if (!is_numeric($year) || (int)$year < 1900 || (int)$year > 2024) {
                                
                if ($request->isMethod('post')) {
                    return back()->with('error', 'El año de la película debe estar entre 1900 y 2024');
                }
                                
                return redirect('/');
            }        
        return $next($request);
    }
}
