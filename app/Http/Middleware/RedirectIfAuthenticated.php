<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null) {
        if (Auth::guard($guard)->check()) {
          $role = Auth::user()->role; 
      
          switch ($role) {
            case 'notulen':
               return redirect('/notulen_dashboard');
               break;
            case 'sekret':
               return redirect('/sekret_dashboard');
               break; 
            case 'pimpinan':
                return redirect('/pimpinan_dashboard');
                break; 
            case 'peserta':
                return redirect('/peserta_dashboard');
                break; 
            // default:
            //    return redirect('/home'); 
            //    break;
          }
        }
        return $next($request);
      }
}
