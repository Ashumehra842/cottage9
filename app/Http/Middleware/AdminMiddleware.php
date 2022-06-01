<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
       
        if(Auth::check() || Auth::user()->isAdmin){
            // dd('hello!');
            if(Auth::user()->isAdmin == '1'){
                return $next($request);
            }else{
                return response()->json(['status'=>'Access denied!. As you do not have permission to access this page.']);
            }
            
        }else{
            return redirect()->with('status','Please LOgin first to access this page');
        }
        return $next($request);
    }
}
