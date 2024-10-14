<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LoginCheck
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
        if(!session()->has('LoggedInUser') && $request->path() != 'login' ){
           return redirect('login');
        }
        if (session()->has('LoggedInUser') && $request->path() == 'login') {
           return back();
        }
        return $next($request)->header('Cache-Control','no-cache, no-store,max-age:0, must-validate')->header('Pragma','no-cache')->header('Expires','Samedi 11 mars2023');
    }
}
