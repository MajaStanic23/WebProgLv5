<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ... $roles)
    {

        if(User::where('id', Auth::id())->whereIn('role', $roles)->first() != null)
            return $next($request);

        return redirect('login');
    }
}
