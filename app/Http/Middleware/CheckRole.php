<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CheckRole
{
    public function handle($request, Closure $next, $role)
    {
        $user = DB::table('users')->where('id', session('user')->id)->first();
        $rol = DB::table('roles')->where('rol', $role)->first();
        if ($user && $user->idRol == $rol->id) {
            return $next($request);
        }

        abort(403, 'Acceso no autorizado.');
    }
}
