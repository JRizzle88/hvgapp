<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Post;
use View;

// extends BaseController
abstract class Controller extends BaseController {

	use AuthorizesRequests, DispatchesCommands, ValidatesRequests;

	protected $footerPosts;
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $footerPosts = Post::take(10)->latest()->get();
    View::share('footerPosts', $footerPosts);
  }
}
