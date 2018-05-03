<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\User;
use App\Post;
use App\Comment;
use App\Page;
use App\Poll;
use App\Answers;

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
Route::get('/', 'WelcomeController@index');


/* Front End - Articles and Comments*/
Route::resource('posts', 'PostsController');
Route::resource('posts.comments', 'CommentsController');
Route::model('posts', 'Post');
Route::model('comments', 'Comment');
Route::bind('posts', function($value, $route) {
	return App\Post::whereSlug($value)->first();
});
Route::bind('comments', function($value, $route) {
	return App\Comment::whereId($value)->first();
});

/* Front End - Pages and Comments? */
Route::resource('pages', 'PagesController', ['only' => ['index', 'show']]);
//Route::resource('posts.comments', 'CommentsController');
Route::model('pages', 'Page');
//Route::model('comments', 'Comment');
Route::bind('pages', function($value, $route) {
	return App\Page::whereSlug($value)->first();
});



Route::get('filemanager/file/{filename}', ['as' => 'getentry', 'uses' => 'FileManagerController@get']);

/* Front End - Teams */
Route::get('teams', array('uses' => 'PagesController@teams'));

////////////////////////////////////////////////////////////////////////////////
// If authorised user is super admin - using middleware to verify group
////////////////////////////////////////////////////////////////////////////////
/* Back End - Admins */
Route::group(['middleware' => 'admin'], function()
{
	Route::get('/home', 'WelcomeController@index');
	Route::get('admin', 'Admin\DashboardController@index');
	Route::get('admin/reports', 'Admin\DashboardController@reports');
	Route::get('admin/players', 'Admin\DashboardController@players');
	Route::get('admin/authors', 'Admin\DashboardController@authors');
	Route::get('player/{users}', ['as' => 'users', 'uses' => 'PlayerController@show']);
	Route::get('player/{users}/edit', ['as' => 'users', 'uses' => 'PlayerController@edit']);
	Route::resource('player', 'PlayerController');
	Route::resource('users', 'PlayerController');
	Route::model('users', 'User');
	Route::bind('users', function($value, $route) {
		return App\User::wherePlayerName($value)->first();
	});

	Route::model('posts', 'Post');
	Route::bind('posts', function($value, $route) {
		return App\Post::whereSlug($value)->first();
	});
	Route::resource('admin/posts', 'Admin\PostsController');
	Route::get('admin/posts', 'Admin\PostsController@index');
	
	Route::model('pages', 'Page');
	Route::bind('pages', function($value, $route) {
		return App\Page::whereSlug($value)->first();
	});
	Route::resource('admin/pages', 'Admin\PagesController');
	Route::get('admin/pages', 'Admin\PagesController@index');
	
	Route::resource('admin/polls', 'Admin\PollsController');
	Route::resource('admin/polls.answers', 'Admin\AnswersController');
	Route::model('poll', 'Poll');
	Route::bind('polls', function($value, $route) {
		return App\Poll::whereId($value)->first();
	});
});
// Super Admin group end



////////////////////////////////////////////////////////////////////////////////
// If authorised user is author - using middleware to verify group
////////////////////////////////////////////////////////////////////////////////
/* Authors */
Route::group(['middleware' => 'author'], function()
{
	Route::get('/home', 'WelcomeController@index');
	Route::get('author', 'Author\DashboardController@index');
	Route::get('author/reports', 'Author\DashboardController@reports');
	Route::get('author/players', 'Author\DashboardController@players');
	Route::get('player/{users}', ['as' => 'users', 'uses' => 'PlayerController@show']);
	Route::model('users', 'User');
	Route::bind('users', function($value, $route) {
		return App\User::wherePlayerName($value)->first();
	});
	
	Route::model('posts', 'Post');
	Route::bind('posts', function($value, $route) {
		return App\Post::whereSlug($value)->first();
	});
	Route::resource('author/posts', 'Author\PostsController');
	Route::get('author/posts', 'Author\PostsController@index');

});
// Author group end



////////////////////////////////////////////////////////////////////////////////
// If authorised user is player - using middleware to verify group
////////////////////////////////////////////////////////////////////////////////
/* Players */
Route::group(['middleware' => 'player'], function()
{
	Route::get('player/{users}', ['as' => 'users', 'uses' => 'PlayerController@show']);
	Route::get('player/{users}/edit', ['as' => 'users', 'uses' => 'PlayerController@edit']);
	Route::bind('users', function($value, $route) {
		return App\User::wherePlayerName($value)->first();
	});
	
	//Route::resource('player', 'PlayerController');
	Route::get('filemanager', 'FileManagerController@index');
	Route::post('filemanager/add',['as' => 'addentry', 'uses' => 'FileManagerController@add']);
});
// Player group end



////////////////////////////////////////////////////////////////////////////////
// If authorized user is a player - using default auth middleware for user
////////////////////////////////////////////////////////////////////////////////
/* Mix: Front End and Back End - Registered Players */
Route::group(['middleware' => 'auth'], function()
{
	//Route::get('player/{users}', ['as' => 'users', 'uses' => 'PlayerController@showSelf']);
	//Route::resource('player', 'PlayerController');
	Route::model('users', 'User');
	Route::model('comments', 'Comment');
	Route::model('posts', 'Post');
	Route::model('pages', 'Page');
	Route::bind('users', function($value, $route) {
		return App\User::wherePlayerName($value)->first();
	});
	Route::bind('posts', function($value, $route) {
		return App\Post::whereSlug($value)->first();
	});
	Route::bind('pages', function($value, $route) {
		return App\Page::whereSlug($value)->first();
	});
	Route::bind('comments', function($value, $route) {
		return App\Comment::whereId($value)->first();
	});
	
	Route::get('players', [ 'uses' => 'PlayerController@index']);
	Route::get('player/{users}', ['as' => 'users', 'uses' => 'PlayerController@show']);
	
	Route::resource('pollvotes', 'PollVotesController', ['only' => ['store']]);

// User/Company group end


});