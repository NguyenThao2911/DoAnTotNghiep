<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Role_AdminManager
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
        if (Auth::check() && (Auth::user()->quanlyquantri) == 1) {
            return $next($request);
        } else {
            return redirect()->back()->with(['flash_level'=>'danger', 'flash_message'=>'Bạn bị giới hạn quyền']);
        }
    }
}
