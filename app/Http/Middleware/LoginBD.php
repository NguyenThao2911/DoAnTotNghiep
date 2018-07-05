<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class LoginBD
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
        if(Auth::guard('bandoc')->check()){
            return $next($request);
        }else{
            return redirect()->back()->with(['flag'=>'success', 'message'=>'Bạn đọc cần phải đăng nhập']);
        }
    }
}
