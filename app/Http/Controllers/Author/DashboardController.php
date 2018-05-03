<?php
namespace App\Http\Controllers\Author;

use App\User;
use App\Post;
use App\Http\Controllers\Controller;

class DashboardController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('author');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$userId = \Auth::user()->id;
		$users = User::take(10)->orderBy('created_at', 'desc')->get();
		$posts = Post::take(10)->orderBy('created_at', 'desc')->get();
		return view('author.dashboard.dashboard')
			->with('users', $users)
			->with('posts', $posts);
	}

	public function reports()
	{
		$usersCount = User::count();
		$subscribedCount = User::where('valid_license', 1)->get()->count();
		$postsCount = Post::count();
		return view('author.dashboard.reports')
			->with('usersCount', $usersCount)
			->with('postsCount', $postsCount)
			->with('subscribedCount', $subscribedCount);
	}

	public function players()
	{
		$users = User::all();
		return view('author.dashboard.players')
			->with('users', $users);
	}

}
