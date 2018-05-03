<?php namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Page;

class PagesController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		//$this->middleware('auth');
		$this->middleware('guest', ['only' => ['index', 'show']]);
	}

   /**
 	 * Display the specified resource.
 	 *
 	 * @param  \App\Post $Post
 	 * @return Response
 	 */
 	public function teams()
 	{
     //$modulePage = Module::where('slug', $slug)->get(array('module_name', 'module_content'))->first();
 		//$staticPages = Page::take(10)->orderBy('created_at', 'desc')->get();
 		// single Post view
 		//return view('pages.show', compact('page'));
		$sidebarPosts = Post::take(10)->latest()->get();
		
    	return view('pages.teams')
			->with('sidebarPosts', $sidebarPosts);
 	}

	/**
 	 * Display the specified resource.
 	 *
 	 * @param  \App\Page $page
	 * @param  \App\Post $post
 	 * @return Response
 	 */
 	public function show(Page $page, Post $post)
 	{
 		$sidebarPosts = Post::take(10)->latest()->get();

 		// single Post view
 		return view('pages.show', compact('page'))
			->with('sidebarPosts', $sidebarPosts);
 	}
	 
}
