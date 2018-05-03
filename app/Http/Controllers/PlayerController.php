<?php 
namespace App\Http\Controllers;

use Input;
use Redirect;
use Auth;
use App\User;
use App\Post;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PlayerController extends Controller {

	protected $rules = [
		'player_name' => ['required', 'min:3'],
		//'email' => ['required'],
		//'user_id' => ['required'],
	];
	
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		//$this->middleware('player');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index(User $user)
	{
		// get all posts
		$users = User::take(100)->orderBy('created_at', 'desc')->get();
		// index view
		return view('player.index', compact('user'))->with('users', $users);
	}

  /**
	 * Display the specified resource.
	 *
	 * @param  \App\User $user
	 * @return Response
	 */
	public function show(User $user)
	{
    //$userId = \Auth::user()->id;
		// single company view
    //$users = User::all();
    $posts = Post::take(10)->orderBy('created_at', 'desc')->where('user_id', $user->id )->get();
		return view('player.show', compact('user'))
			//->with('users', $users)
			->with('posts', $posts);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\User $user
	 * @return Response
	 */
	public function showSelf(User $user)
	{
    //$userId = \Auth::user()->id;
		// single company view
    //$users = User::all();
    $posts = Post::orderBy('created_at', 'desc')->where('user_id', $user->id )->get();
		return view('player.show', compact('user'))
		//	->with('users', $users)
			->with('posts', $posts);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\User $user
	 * @return Response
	 */
	public function edit(User $user)
	{
		// if not current user
		if(Auth::user()->id == $user->id) {
			// show after edit Post
			return view('player.edit', compact('user'));
		} else {
			// back to players list
			return $this->index($user);
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\User $user
	 * @param  \Illuminate\Http\Request $request
	 * @return Response
	 */
	public function update(User $user, Request $request)
	{
		$this->validate($request, $this->rules);

		//$input = Input::except(array('_method', '_token'));
		//$user = User::wherePlayerName(User)->firstOrFail();
		$user->fill(Input::all());
		$user->update();

		$posts = Post::orderBy('created_at', 'desc')->where('user_id', $user->id )->get();
		return Redirect::route('player.show', $user->player_name )
			->with('message', 'Player Profile updated.')
			->with('posts', $posts);

	}
}
