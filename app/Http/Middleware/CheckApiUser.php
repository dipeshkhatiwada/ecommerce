<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class CheckApiUser
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

        if (User::where('api_token',$request->api_token)->count() == 0){
            return response()->json('Unauthorized', 401);
        }
        return $next($request);
    }
}
