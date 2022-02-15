<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckLoginAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //echo 'đây là middle ware';
        if (!$this->isLogin()) {
            return redirect(route('home'));
        }

        //Lọc chỉ hiển thị 'Khu vực quản trị' khi nằm trong url có path admin và admin/...
        if ($request->is('admin/*') || $request->is('admin')) {
            echo '<h3>Khu vực quản trị</h3>';
        }
        return $next($request);
    }

    public function isLogin()
    {
        return true;
    }
}
