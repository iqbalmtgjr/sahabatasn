<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class checkRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (in_array($request->user()->role, $roles)) {
            return $next($request);
        }

        toastr()->error('Anda tidak memiliki hak akses', 'Gagal');
        return redirect()->back();
    }
}
