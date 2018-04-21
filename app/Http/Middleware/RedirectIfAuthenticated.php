<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // switch ($guard) {
        //     case 'sippKlingAuth':
        //         if (Auth::guard($guard)->check()) {
        //             // return redirect()->route('sippKlingAuth.dashboard');
        //             return redirect('/sipp-kling');
        //           }
        //         break;
            
        //     default:
        //         if (Auth::guard($guard)->check()) {
        //             return redirect('/');
        //         }
        //         break;
        // }
        
        if (Auth::guard($guard)->check()) {
            return redirect('/dashboard');
        }

        return $next($request);
    }
}
