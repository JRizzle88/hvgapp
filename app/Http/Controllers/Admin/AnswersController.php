<?php
namespace App\Http\Controllers\Admin;

use Input;
use Redirect;
use App\Poll;
use App\Answers;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AnswersController extends Controller {

	protected $rules = [
		'answer' => ['required', 'min:3'],
	];

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		//$this->middleware('admin');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @param  \App\User $user
	 * @return Response
	 */
	//public function index(Answers $answers)
	//{
		//$userId = \Auth::user()->id;
		// get all posts
	//	$polls = Poll::take(500)->get();
	//	$pollAnswers = Answers::take(10)->orderBy('answer', 'desc')->where('poll_id', $answers->poll_id )->get();
		// index view
	//	return view('admin.polls.index')
	//		->with('polls', $polls)
	//		->with('pollAnswers', $pollAnswers);

	//}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @param  \App\User $user
	 * @return Response
	 */
	public function create(Poll $poll)
	{
		// create view
		return view('admin.polls.answers.create', compact('poll'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return Response
	 */
	public function store(Poll $poll, Request $request)
	{
		//
		$this->validate($request, $this->rules);
		
		$input = Input::all();
		
		Answers::create( $input );

		return Redirect::route('admin.polls.index')->with('Answer created.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Post $Post
	 * @return Response
	 */
	public function show(Poll $poll)
	{
		//$sidebarPosts = Post::take(10)->orderBy('created_at', 'desc')->get();
		// single Post view
		return view('admin.polls.show', compact('poll'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Post $Post
	 * @return Response
	 */
	public function edit(Poll $poll)
	{
		// show after edit Post
		return view('admin.polls.edit', compact('poll'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Post $Post
	 * @param  \Illuminate\Http\Request $request
	 * @return Response
	 */
	public function update(Poll $poll, Request $request)
	{
		$this->validate($request, $this->rules);

		$input = array_except(Input::all(), '_method');
		$poll->update($input);

		return Redirect::route('admin.polls.index', $poll->id)->with('message', 'Answer updated.');

		// show after update post
		//return view('posts.show', compact('post'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Post $post
	 * @return Response
	 */
	public function destroy(Answers $answer)
	{
		$answer->delete();

		return Redirect::route('admin.polls.index')->with('message', 'Answer deleted.');

	}

}
