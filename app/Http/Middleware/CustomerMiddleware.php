<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CustomerMiddleware
{
    private $cus;

    public function __construct(){

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'cus')
    {
        if (Auth::guard($guard)->check()) {
            return $next($request);
        }
        return redirect()->route('index')->with('error', 'Bạn cần phải đăng nhập');
    }
}
