<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
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
        $user = Auth::user();

        if ($user->is_admin) {
            // Si el usuario es administrador (is_admin = 1), redirigir a /admin/dashboard
            return redirect('/admin/dashboard');
        }

        // Si el usuario es un usuario normal (is_admin = 0), permitir el acceso a /dashboard
        return $next($request);
    }
}
