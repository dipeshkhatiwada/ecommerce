<?php

namespace App\Http\Middleware;

use Closure;

class CheckPermission
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
       $route_name = $request->route()->getName();
//       dd($route_name);
//       $access = false;
//       foreach(auth()->user()->role->permissions as $permission){
//           if ('backend.' . $permission->route == $route_name){
//               $access = true;
//           }
//       }
//       if ($access == false){
//           dd('Permission not allowed for this user role');
//       }
        return $next($request);
    }
}
