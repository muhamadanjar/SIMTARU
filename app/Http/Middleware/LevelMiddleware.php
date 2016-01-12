<?php namespace App\Http\Middleware;

use Closure;

class LevelMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next,$roleName)
	{
		if (Auth::check() && ! Auth::user()->hasRole($roleName))
	    {
	        return abort(401, 'Unauthorized');
	    }
		
		return $next($request);
	}

}
