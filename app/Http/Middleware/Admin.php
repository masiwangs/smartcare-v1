<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
      if(Auth::user() && Auth::user()->role == 'admin'){
        return $next($request);
      }

      return redirect('/administrator/login')->withErrors([
        'password' => 'Email dan password tidak tepat'
      ]);
    }
}
