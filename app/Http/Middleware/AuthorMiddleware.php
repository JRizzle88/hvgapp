<?php namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;
use Redirect;
use Illuminate\Http\RedirectResponse;

class AuthorMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		//var_dump($request->user()->role);
		//if ( User::role() = 'author' )
		//if ($this->auth->check())
		//{
			$user = $request->user();

			// is a user and is NOT an admin
			if($user && $user->isAuthor())
			{	
				return $next($request);
				//return Redirect::to('/')->with('message', 'You are not authorized as an author.');
			} else {
				
				//return Redirect::to('/')->with('message', 'You are not authorized as an author.');
				// is a user and is an admin
				if ($user && $user->isPlayer())
				{
					//var_dump($request->user());
					return $next($request);
					// admin/dashboard
					return Redirect::to('/');
				} 
				//else {
					// redirect to home page if the user is not authorized
				return Redirect::to('/');
				//}
			}

			return $next($request);

	}

}
