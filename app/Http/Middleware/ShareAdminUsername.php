<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class ShareAdminUsername
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if ($user) {
            View::share('adminUsername', $user->name ?? 'Guest'); // Assuming you want to share the email
        } else {
            View::share('adminUsername', 'Guest');
        }

        return $next($request);
    }
}
