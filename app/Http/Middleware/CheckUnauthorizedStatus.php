<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUnauthorizedStatus
{
    /**
     * Check if it's unauthorized.
     * If it's authorized, go to home page
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        if ($user !== null){
            return redirect()
                    ->route("home")
                    ->with('message', array('danger', 'Unauthorized access.'));
        }
        return $next($request);
    }
}