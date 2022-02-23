<?php

namespace App\Http\Middleware;

use Closure;

class CheckEmailVerification
{
    public function handle($request, Closure $next)
    {
        if ($request->user() && !$request->user()->hasVerifiedEmail()){
            session()->flash('verifyEmail',true);
        }
        return $next($request);
    }
}
