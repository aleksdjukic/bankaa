<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $authRole = Auth::user()->role->name;
        $roles    = ['Admin'];

        if (in_array($authRole, $roles))
        {

            return $next($request);
        }

        return abort(404);

    }
}
