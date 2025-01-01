<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AddSecurityHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Get the response
        $response = $next($request);

        Log::info("AddSecurityHeaders middleware triggered");

        // Content Security Policy (CSP)
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

        // Set CSP header
        $response->headers->set('Content-Security-Policy', $csp);

        // Anti-Clickjacking header
        $response->headers->set('X-Frame-Options', 'DENY');

        return $response;
    }
}
