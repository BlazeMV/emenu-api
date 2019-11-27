<?php

namespace App\Http\Middleware;

use App\Exceptions\AccessDeniedException;
use Closure;
use Illuminate\Http\Request;

class CustomerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     * @throws AccessDeniedException
     */
    public function handle($request, Closure $next)
    {
        if (auth()->user()->type == 'admin' || auth()->user()->type == 'customer') {
            return $next($request);
        }
        throw new AccessDeniedException();
    }
}
