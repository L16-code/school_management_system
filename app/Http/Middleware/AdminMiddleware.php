<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Spatie\Permission\Exceptions\UnauthorizedException;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function handle(Request $request, Closure $next,$role,$role1,$role2)
    {
        // $user=new User;
        if(Auth::check() && Auth::user()->role_as ==$role){
        return $next($request);

        }
        if(Auth::check() && Auth::user()->role_as ==$role1){
            return $next($request);

            }
        if(Auth::check() && Auth::user()->role_as ==$role2){
                return $next($request);

                }
                $ro = $role." ".$role1." ".$role2." ";
        // elseif(Auth::user()->role_as =='1'){
        //     // return Redirect('/home')->with('status', 'access denied you are not a admin');
        //     return $next($request);
        // }
        return Redirect('/home')->with('status', $ro);

    }
}
