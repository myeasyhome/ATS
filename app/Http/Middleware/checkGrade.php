<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class checkGrade
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
        
        if ( Auth::user()->grade > 6 ) {
            return $next($request);
        }
        
        // return response('Permission Denied!!' , 401);
        return new Response(view('Other_pages.permission_denied'));
    }
}
