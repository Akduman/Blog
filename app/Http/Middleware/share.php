<?php

namespace App\Http\Middleware;

use App\Pages;
use App\Settings;
use Closure;
use Illuminate\Support\Facades\View;

class share
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
       
        $data['settings']=Settings::all();
        foreach ($data['settings'] as $key) {
            $descriptions[$key->settings_key]=$key->settings_value;            
        }
        $settings['descriptions']=$descriptions;

        $pages=Pages::all()->sortBy('pages_must')->first();
        $settings['pages_slug']=$pages['pages_slug'];
        //dd($settings);
        View::share($settings);
        return $next($request);
    }
}
