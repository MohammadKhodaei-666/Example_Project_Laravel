<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Client;

class SetLangLocale
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
        if (session()->get('lang')=="kordi"){
            app()->setLocale('kordi');
            //app()->getLocale();
        }else {
            $client=new Client();
            $ip=$request->ip();
            $response=$client->get("http://ip-api.com/json".$ip);
            $responseResult=$response->getBody()->getContents();
            $city=$responseResult->city;
            if ($city=="tehran"){
                app()->setLocale('fa');
            }
        }
        app()->setLocale($request->user()->getLocale());
        return $next($request);
    }
}
