<?php namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use DateTime;
use Redirect;
use App\User;
use Session;
use Auth;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers, ThrottlesLogins;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();

		$this->middleware('guest', ['except' => 'getLogout']);
	}

	public function postLogin(Request $request)
	{
		// user login attempt to update timestamp
		if ($this->auth->attempt(['email' => $request->email, 'password' => $request->password])) {
			Session::put('user_id', Auth::user()->id );
			//Session::user_id == Auth::user()->id;
			Session::save();
			//$session = Sessions::find(Session::getId());
			//$session = Session::getId();
			//$session->user_id = Auth::user()->id;
			//$session->save();
			$request->user()->last_login = new DateTime();
			$request->user()->online = 1;
			$request->user()->save();
			return Redirect::intended('/')->with('message', 'Hey There! Welcome Back.');
		} else {
			return Redirect::to('auth/login')->with('message', 'You dont seem to be registered. Register Now!');
		}
	}

	public function getLogout(Request $request){
		//$user = $this->auth;
		$request->user()->online = 0;
		$request->user()->save();
		$this->auth->logout();

		//$request->user()->logout();
    	return Redirect::to('/');
	}
}
