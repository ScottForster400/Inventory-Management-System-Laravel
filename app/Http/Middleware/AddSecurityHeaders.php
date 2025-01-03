<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AddSecurityHeaders
{
    public function handle(Request $request, Closure $next)
    {
        // Gets the response
        $response = $next($request);

        Log::info("AddSecurityHeaders middleware triggered");

        // Content security policy rules
        $csp = "default-src 'self'; ";
        $csp .= "script-src 'self' 'unsafe-inline' 'unsafe-eval' https://cdn.tailwindcss.com https://cdn.jsdelivr.net https://cdn.flowbite.com; ";
        $csp .= "style-src 'self' 'unsafe-inline' https://fonts.bunny.net https://cdn.tailwindcss.com https://cdn.jsdelivr.net https://cdn.flowbite.com; ";
        $csp .= "img-src 'self' data:; ";
        $csp .= "font-src 'self' https://fonts.bunny.net; ";
        $csp .= "connect-src 'self'; ";
        $csp .= "frame-src 'none'; ";
        $csp .= "object-src 'none'; ";
        $csp .= "child-src 'none'; ";
        $csp .= "form-action 'self'; ";
        $csp .= "upgrade-insecure-requests;";

        // Sets the CSP header on all pages
        $response->headers->set('Content-Security-Policy', $csp);

        // Sets the Anti Clickjacking on all pages
        $response->headers->set('X-Frame-Options', 'DENY');

        return $response;
    }
}
