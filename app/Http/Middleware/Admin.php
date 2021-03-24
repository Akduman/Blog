<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;


class Admin
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

        if (!Auth::guest() && Auth::user()->role=='admin')
        {
            return $next($request);

        } else {
            return redirect(route('nedmin.Login'))->with('error','You do not have authorized');
        }
        return redirect(route('nedmin.Login'));
    }
}
