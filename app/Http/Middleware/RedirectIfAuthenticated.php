<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\RedirectResponse;

class RedirectIfAuthenticated {

	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	/**
	 * Create a new filter instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		//var_dump($this->auth->check());
		if ($this->auth->check())
		{
			$user = $request->user();
			// are we a registered player?
			if($user && $user->isPlayer()) {
				return $next($request);
				//return new RedirectResponse(url('/'));
			}
		}
		return $next($request);

	}

}
