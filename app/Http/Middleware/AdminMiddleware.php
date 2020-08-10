<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) { // chưa đăng nhập
            return redirect()->route('login');
        }

        $user = Auth::user(); //lấy thông tin user khi đã đăng nhập

        // kiểm tra quyền của người dùng
        $route = $request->route()->getName();

        if ($user->cant($route)) {
            return redirect()->route('admin.error',['code' => 403]);
        }
        // dd($user->cant($route));
        return $next($request);
    }
}
