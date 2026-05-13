<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
     public function handle(Request $request, Closure $next, string $role)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        if ($user->role !== $role) {
            abort(403, 'Unauthorized access');
        }

        if ($user->status !== 'active') {
            Auth::logout();
            return redirect()->route('login')
                ->with('error', 'Your account is blocked');
        }

        return $next($request);
    }
}
