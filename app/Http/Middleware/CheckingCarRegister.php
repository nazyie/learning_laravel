<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckingCarRegister
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
      if($request->input('regNo') <= 200){
        return redirect('/');
      }

      return $next($request);
    }
}
