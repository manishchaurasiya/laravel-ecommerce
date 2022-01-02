<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;

class AuthMiddleware
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

    if (auth()->user()) {
      
      return $next($request);
    } else {

      if (!session()->has('url.intended')) {
        session(['url.intended' => url()->previous()]);
      }
      return redirect('login');
    }

    return $next($request);
  }
}
