<?php

namespace App\Http\Middleware;
use Closure;
class RoleMiddleware
{
    /**
     * Handle an incoming request.
     * @param $request
     * @param Closure $next
     * @param $role
     * @param null $permission
     * @return mixed
     */
    public function handle($request, Closure $next, $role, $permission = null)
    {
        
        if(\Auth::check() && $request->user()->hasRole($role) != null ) {
            if (!$request->user()->hasRole($role)) {
    
                return redirect('/');
            }
        
            /*if($permission !== null && !auth()->user()->can($permission)) {
                abort(404);
            }*/
            return $next($request);
        }
        return redirect('/login');
    }
}