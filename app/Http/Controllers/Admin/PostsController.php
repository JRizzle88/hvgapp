<?php
namespace App\Http\Controllers\Admin;

use Input;
use Redirect;
use App\User;
use App\Post;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PostsController extends Controller {

	protected $rules = [
		'name' => ['required', 'min:3'],
		'slug' => ['required'],
	];

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//parent::__construct();
		//$this->middleware('admin');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @param  \App\User $user
	 * @return Response
	 */
	public function index(User $user)
	{
		$userId = \Auth::user()->id;
		// get all posts
		$posts = Post::take(500)->get();
		// index view
		return view('admin.posts.index', compact('user'))->with('posts', $posts);

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @param  \App\User $user
	 * @return Response
	 */
	public function create(User $user)
	{
		// create view
		return view('admin.posts.create', compact('user'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
		$this->validate($request, $this->rules);
		
		$request['user_id'] = $request->user()->id;
		$input = Input::all();
		Post::create( $input );

		return Redirect::route('admin.posts.index')->with('message', 'Article created');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Post $Post
	 * @return Response
	 */
	public function show(Post $post)
	{
		$sidebarPosts = Post::take(10)->orderBy('created_at', 'desc')->get();
		// single Post view
		return view('posts.show', compact('post'))->with('sidebarPosts', $sidebarPosts);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Post $Post
	 * @return Response
	 */
	public function edit(Post $post)
	{
		// show after edit Post
		return view('admin.posts.edit', compact('post'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Post $Post
	 * @param  \Illuminate\Http\Request $request
	 * @return Response
	 */
	public function update(Post $post, Request $request)
	{
		$this->validate($request, $this->rules);

		$input = array_except(Input::all(), '_method');
		$post->update($input);

		return Redirect::route('admin.posts.show', $post->slug)->with('message', 'Article updated.');

		// show after update post
		//return view('posts.show', compact('post'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Post $post
	 * @return Response
	 */
	public function destroy(Post $post)
	{
		$post->delete();

		return Redirect::route('admin.posts.index')->with('message', 'Article deleted.');

	}

}
