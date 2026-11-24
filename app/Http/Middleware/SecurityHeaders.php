<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Basic security headers for every page (patients' data goes through the
 * booking and contact forms, so the browser protections should be on).
 */
class SecurityHeaders
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        $headers = [
            // Never guess file types (stops some script-injection tricks).
            'X-Content-Type-Options' => 'nosniff',
            // Other websites cannot show our pages inside a frame (clickjacking).
            'X-Frame-Options' => 'SAMEORIGIN',
            // Do not leak full page addresses to other websites.
            'Referrer-Policy' => 'strict-origin-when-cross-origin',
            // The site does not use the camera, microphone or location.
            'Permissions-Policy' => 'camera=(), microphone=(), geolocation=(), payment=()',
        ];

        if ($request->isSecure()) {
            // Browsers must always use HTTPS for this site (1 year).
            $headers['Strict-Transport-Security'] = 'max-age=31536000';
        }

        foreach ($headers as $name => $value) {
            if (! $response->headers->has($name)) {
                $response->headers->set($name, $value);
            }
        }

        return $response;
    }
}
