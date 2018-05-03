<?php namespace App\Http\Controllers;

use App\Post;
use App\User;

class PostsController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		$this->middleware('guest', ['only' => ['index', 'show']]);
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
    $sidebarPosts = Post::take(10)->latest()->get();
		// get all posts
		$posts = Post::take(50)->latest()->get();
		$seo_title = 'Articles | High Voltage Gaming';
		$seo_keywords = 'gaming, community, clan, guild, fps, rpg, mmo, survival, group, party, friends, tags';
		$seo_description = 'High Voltage Gaming is a community built around casual gameplay and competitive gameplay for those who choose to get involved.';
		// index view
		return view('posts.index')
			->with('posts', $posts)
			->with('seo_title', $seo_title)
			->with('seo_keywords', $seo_keywords)
			->with('seo_description', $seo_description)
			->with('sidebarPosts', $sidebarPosts);
	}

   /**
 	 * Display the specified resource.
 	 *
 	 * @param  \App\Post $Post
 	 * @return Response
 	 */
 	public function show(Post $post)
 	{
 		$sidebarPosts = Post::take(10)->latest()->get();

 		// single Post view
 		return view('posts.show', compact('post'))
			->with('sidebarPosts', $sidebarPosts);
 	}

}
