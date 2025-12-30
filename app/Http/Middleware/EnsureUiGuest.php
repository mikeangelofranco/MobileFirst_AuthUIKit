<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUiGuest
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->session()->has('ui.user')) {
            return redirect()->route('dashboard');
        }

        return $next($request);
    }
}

