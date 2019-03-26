<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class AdminValidate
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
      if(Session::get('login')){
        if(Session::get('id_level') == 1){
          return $next($request);
        }else{
          \abort(403,'Unauthorized action.');
        }  
      }else{
        return redirect('/masuk');
      }    
    }
}
