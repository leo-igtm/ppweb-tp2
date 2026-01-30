<?php

namespace App\Http\Middleware;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Closure;

class HandleInertiaRequests
{
    public function handle(Request $request, Closure $next)
    {
        Inertia::setRootView('app');
        
        Inertia::share([
            'auth' => [
                'user' => $request->user(),
            ],
        ]);

        return $next($request);
    }
}
