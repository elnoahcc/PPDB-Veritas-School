<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role): Response
    {
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('login');
        }

        // Pastikan tidak case-sensitive
        if (strtolower($user->role) !== strtolower($role)) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
