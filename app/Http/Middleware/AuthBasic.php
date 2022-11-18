<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthBasic
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
        if(!isset($_SERVER ['PHP_AUTH_USER'])) {
            header ("WWW-Authenticate: Basic realm=\"Private Area\"");
            header ("HTTP/1.0 401 Unauthorized");
            print "Sorry, you need proper credentials";
            exit;
        } else {
            if(($_SERVER['PHP_AUTH_USER'] == env('PAU') && ($_SERVER['PHP_AUTH_PW'] == env('PAP')))){
                return $next($request);
            } else {
                header ("WWW-Authenticate: Basic realm=\"Private Area\"");
                header ("HTTP/1.0 401 Unauthorized");
                print "Sorry, you need proper credentials";
                exit;
            }
        }
    }
}
