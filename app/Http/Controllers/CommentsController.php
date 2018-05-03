<?php namespace App\Http\Controllers;

use Input;
use Redirect;
use App\Post;
use App\Comment;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentsController extends Controller {

  protected $rules = [
		'content' => ['required', 'max:500'],
	];

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		$this->middleware('auth', ['only' => ['store', 'update', 'destroy']]);
	}

  /**
	 * Display a listing of the resource.
	 *
	 * @param  \App\Comment $comment
	 * @return Response
	 */
	public function index(Post $post)
	{
		// all commentss
		return view('comments.index', compact('post'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @param  \App\Post $post
	 * @return Response
	 */
	public function create(Post $post)
	{
		// create comment
		return view('comments.create', compact('post'));
	}

  /**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Post $post
	 * @param  \Illuminate\Http\Request $request
	 * @return Response
	 */
	public function store(Post $post, Request $request)
	{
		//
		$this->validate($request, $this->rules);
		
		$request['post_id'] = $post->id;
    	$request['user_id'] = $request->user()->id;
		$input = Input::all();
		
		Comment::create( $input );

		return Redirect::route('posts.show', $post->slug)->with('Comment created.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Post $post
	 * @param  \App\Comment $comment
	 * @return Response
	 */
	public function show(Post $post, Comment $comment)
	{
		return view('comments.show', compact('post', 'comment'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Post $post
	 * @param  \App\Comment $comment
	 * @return Response
	 */
	public function edit(Post $post, Comment $comment)
	{
		return view('comments.edit', compact('post', 'comment'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Post $post
	 * @param  \App\Comment $comment
	 * @param  \Illuminate\Http\Request $request
	 * @return Response
	 */
	public function update(Post $post, Comment $comment, Request $request)
	{
		//
		$this->validate($request, $this->rules);

		$input = array_except(Input::all(), '_method');
		$comment->update($input);

		return Redirect::route('posts.show', [$post->slug, $comment->id])->with('message', 'Comment updated.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Post $post
	 * @param  \App\Comment $comment
	 * @return Response
	 */
	public function destroy(Post $post, Comment $comment)
	{
		//
    $comment->delete();

		return Redirect::route('posts.show', $post->slug)->with('message', 'Comment deleted.');
	}

}
