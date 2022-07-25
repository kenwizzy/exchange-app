<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class User
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
        //check if the user is logged in
        if(Auth::check()){

            //check if the logged in user is an admin and author
            if(Auth::user()->role->name == "User"){

               return $next($request);

            }

        }
          return redirect('/login')->with('sign_error', 'Please sign in to continue');

    }
}
