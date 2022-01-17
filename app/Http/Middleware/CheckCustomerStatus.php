<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckCustomerStatus
{
    /**
     * Check if the role is customer.
     * 
     * If the role is guest, go to login page
     * If the role is manager, go to home page.
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        if ($user === null){
            return redirect()
                    ->route("login")
                    ->with('message', array('danger', 'Unauthorized access.'));
        }
        if ($user->role == "M"){
            return redirect()
                    ->route("home")
                    ->with('message', array('danger', 'Unauthorized access.'));
        }
        return $next($request);
    }
}
