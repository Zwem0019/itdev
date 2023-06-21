<?php

namespace App\Http\Middleware;

use Closure;

use App\TokenStore\TokenCache;
use Illuminate\Support\Facades\Auth;
use Microsoft\Graph\Graph;

/**
 * Middleware to handle Microsoft Graph authentication.
 */
class MicrosoftGraphAuth
{
    /**
     * Check an incoming request for a valid Microsoft Graph access token.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $roles = null)
    {
        // Check if the user has a valid Microsoft Graph access token
        $tokenCache = new TokenCache();
        $accessToken = $tokenCache->getAccessToken();

        // Check if the user is authenticated, redirect to login if not
        if (!Auth::check() || !$accessToken) {
            return redirect('/login');
        }

        // Check whether the user had the required roles
        if ($roles != null) {
            $roles = json_decode($roles);
            $role = Auth::user()->role();
            if (!in_array($roles, $role)) {
                return redirect('/dashboard');
            }
        }

        // Create a new Graph instance with the token and add it to the request
        $graph = new Graph();
        $graph->setAccessToken($accessToken);
        $request->attributes->add(['graph' => $graph]);

        // Continue the request
        return $next($request);
    }
}
