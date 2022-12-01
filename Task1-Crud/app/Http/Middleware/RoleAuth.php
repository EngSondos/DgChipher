<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route ;
use Illuminate\Support\Facades\Session;

class RoleAuth
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
        $route = Route::getRoutes()->match($request);
        $currentroute = $route->getName();
        foreach(Session::get('permissions') as $permission ){
           if( Str::contains($currentroute, Str::lower( $permission->name) )){
            return $next($request);
           }
        }
        return redirect()->route('articale.index');
    }
}
