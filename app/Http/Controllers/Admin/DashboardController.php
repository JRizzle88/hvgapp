<?php
namespace App\Http\Controllers\Admin;

use App\User;
use App\Post;
use App\Page;
use App\Http\Controllers\Controller;

class DashboardController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('admin');
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
		return view('admin.dashboard.dashboard')
			->with('users', $users)
			->with('posts', $posts);
	}

	public function reports()
	{
		$usersCount = User::count();
		$subscribedCount = User::where('valid_license', 1)->get()->count();
		$authorsCount = User::where('role', 'author')->get()->count();
		$adminsCount = User::where('role', 'super_admin')->get()->count();
		$postsCount = Post::count();
		$pagesCount = Page::count();
		return view('admin.dashboard.reports')
			->with('usersCount', $usersCount)
			->with('postsCount', $postsCount)
			->with('pagesCount', $pagesCount)
			->with('authorsCount', $authorsCount)
			->with('adminsCount', $adminsCount)
			->with('subscribedCount', $subscribedCount);
	}

	public function players()
	{
		$users = User::all();
		return view('admin.dashboard.players')
			->with('users', $users);
	}
	
	public function authors()
	{
		$users = User::where('role', 'author')->get();
		return view('admin.dashboard.authors')
			->with('users', $users);
	}

}
