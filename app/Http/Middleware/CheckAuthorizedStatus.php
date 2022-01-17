<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAuthorizedStatus
{
    /**
     * Check if the role is authorized.
     * If it's unauthorized, go to login page.
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        if ($user === null){
            return redirect()
                    ->route("login")
                    ->with('message', array('danger', 'Unauthorized access.'));
        }
        return $next($request);
    }
}