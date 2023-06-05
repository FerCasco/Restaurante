<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        $user = DB::table('users')->where('id', session('user')->id)->first();
        foreach ($roles as $role) {
            if ($this->hasRole($user, $role)) {
                return $next($request);
            }
        }
        abort(403, 'Acceso no autorizado.');
    }

    private function hasRole($user, $role)
    {
        $rol = DB::table('roles')->where('rol', $role)->first();

        return $user && $user->idRol == $rol->id;
    }
}
