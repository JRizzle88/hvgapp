<?php namespace App\Http\Controllers;

use Auth;
use Input;
use Redirect;
use App\Poll;
//use App\Answers;
use App\PollVotes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PollVotesController extends Controller {
	
	protected $rules = [
		//'users_id',
		'answers_id',
	];
	
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		//$this->middleware('auth', ['only' => ['store']]);
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Post $post
	 * @param  \Illuminate\Http\Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
		$this->validate($request, $this->rules);
		$request['users_id'] = $request->user()->id;
		$input = Input::all();
		
		PollVotes::create( $input );

		return Redirect::back()->with('message', 'Thanks for Voting! Keep checking back for more.');
		//return Redirect::route('/')->with('message', 'Vote submitted.');
	}
	
}