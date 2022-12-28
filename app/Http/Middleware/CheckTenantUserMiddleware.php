<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckTenantUserMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->tenants()->where('id', tenant('id'))->doesntExist()) {
            abort(Response::HTTP_FORBIDDEN);
        }

        return $next($request);
    }
}
