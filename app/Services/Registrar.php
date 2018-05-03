<?php namespace App\Services;

use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;
use Illuminate\Support\Facades\Mail;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'player_name' => 'required|max:255',
			'first_name' => 'required|max:255',
			'last_name' => 'max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6|max:255',
			'city' => 'max:255',
			'state' => 'max:255',
			'phone' => 'max:12',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		$user = User::create([
			'player_name' => $data['player_name'],
			'first_name' => $data['first_name'],
			'last_name' => $data['last_name'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
			'city' => $data['city'],
			'state' => $data['state'],
			'phone' => $data['phone'],
		]);
		
		// send new user Welcome email
		Mail::send('emails.welcome', $data, function($message) use ($data)
        {
            $message->from('no-reply@hvg.com', "HVGApp");
            $message->subject("Welcome to HVGApp");
            $message->to($data['email']);
        });
		
		// create user
		return $user; 
			
	}

}
