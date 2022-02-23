<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
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
        if (Auth::check()){
            $user=Auth::user();
            $isAdmin=false;
            foreach ($user->roles as $role){
                if ($role->name == ("مدیر"||"معاون")){
                    $isAdmin=true;
                    break;
                }
            }
            if ($isAdmin){
                return $next($request);
            }
            return redirect('admin');
            //return view('back.index');
        }
        else{
            return redirect('login');
        }
    }
}
