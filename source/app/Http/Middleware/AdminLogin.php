<?php

namespace App\Http\Middleware;
use Auth;
use Illuminate\Support\Facades\Route;
use Closure;

class AdminLogin
{
    /**
     * Handle Check Login Admin.
     * Use Guard 'admins'.
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->guard('admins')->check()) {
            return $next($request);
        } else {
            return redirect()->route('auth.login');
        }
    }
}

// Middleware đóng vai trò như là 1 lễ tân
// Khi vô văn phòng => gặp lễ tân => Nếu lễ tân cho mình vô văn hòng => mới dô,
        // lễ tân ko cho thì ra ngoài
