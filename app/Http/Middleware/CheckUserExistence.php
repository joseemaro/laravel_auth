<?php

namespace App\Http\Middleware;

use Closure;

use App\User;

class CheckUserExistence
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
        if (User::get()->first()){
            return route('login');
        }

        return $next($request);
    }
}
