<?php

namespace App\Http\Middleware;

use Closure;

class UserAuth
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
        $user = auth()->user();
        if ($request->username) {
            if ($user->username != $request->username || !$user->hasRole('user'))
                abort(403);
        }

        return $next($request);
    }
}
