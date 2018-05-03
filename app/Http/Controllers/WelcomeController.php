<?php namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Poll;
use App\Answers;
use App\PollVotes;
use Auth;
use Session;
use Carbon;
use Steam;

use App\Http\Controllers\Controller;

class WelcomeController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		$this->middleware('guest');

	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$sessionUser = Session::get('user_id');
		
		// Steam Games to Track from Steam API
		$choseGamesToShow = array(
			'107410',
			'730',
			'205790',
			'271590',
			'295110'
		);
		
		// Get latest users
		$users = User::take(10)->latest()->get();
		// Get latest users steamId
		$usersSteamId = User::take(5)->lists('steam');
		$posts = Post::take(6)->latest()->get();
		$polls = Poll::take(1)->latest()->get();
		
		// SEO for Home Page
		$seo_title = 'High Voltage Gaming | Community';
		$seo_keywords = 'gaming, community, clan, guild, fps, rpg, mmo, survival, group, party, friends, tags';
		$seo_description = 'High Voltage Gaming is a community built around casual gameplay and competitive gameplay for those who choose to get involved.';
		
		$steamId = array();
		foreach ($usersSteamId as $id) {
			// verify to get rid of funky null column thats inserted at the end of a new array defined above as $steamId
			if($id != null) {
				array_push($steamId,$id);
			};
		};
		
		$steamPlayerLevelDetails = array();
		$steamPlayerSummary = array();
		$steamPlayerOwnedGames = array();
		$limitedPlayers = array();
		
		foreach($steamId as $id) {
			// Get steam player details	
			$steamPlayerLevelQuery = Steam::player($id)->GetPlayerLevelDetails();
			$steamPlayerSummaries = Steam::user($id)->GetPlayerSummaries()[0];
			$steamPlayerOwnedGames = Steam::player($id)->GetOwnedGames();

			
			// array holding all information gather about the player
			array_push($steamPlayerSummary, array($steamPlayerSummaries, $steamPlayerLevelQuery, $steamPlayerOwnedGames));
			// limited to return only 6 steam users for home page using the above array
			$limitedPlayers = array_slice($steamPlayerSummary, 0, 6);
			//var_dump($limitedPlayers[1]);
			
		}
		
		//var_dump($steamPlayerLevelDetails);
		//var_dump($steamPlayerSummary);
		//var_dump($limitedPlayers);
		
		//$steamId = '76561198021768446';		
		//$steamPlayerUrl = Steam::user($steamId)->ResolveVanityURL('jrizzle88');
		
		//$steamPlayerOwnedGamesArray = Steam::player($steamId)->GetOwnedGames(true, false, $choseGamesToShow); // works with @foreach loop
		//$steamPlayerSummaries = Steam::user($steamId)->GetPlayerSummaries(); // htmlentities error
		//$steamHVGGroup = Steam::group()->GetGroupSummary('Dota 2'); // error parsing attribute error
		//$steamPlayerLevelDetails = Steam::player($steamId)->GetPlayerLevelDetails(); // htmlentities error
		//$steamPlayerBadges = Steam::player($steamId)->GetBadges(); // htmlentities error
		
	
		return view('welcome')
			->with('seo_title', $seo_title)
			->with('seo_keywords', $seo_keywords)
			->with('seo_description', $seo_description)
			->with('posts', $posts)
			->with('polls', $polls)
			//->with('pollVotes', $pollVotes)
			//->with('vote', $vote)
			->with('users', $users)
			->with('sessionUser', $sessionUser)
			//->with('steamPlayerLevelDetails', $steamPlayerLevelDetails)
			//->with('steamPlayerBadges', $steamPlayerBadges)
			//->with('steamPlayerOwnedGames', $steamPlayerOwnedGames)
			//->with('steamPlayerOwnedGamesArray', $steamPlayerOwnedGamesArray)
			//->with('steamHVGGroup', $steamHVGGroup)
			//->with('steamPlayerSummaries', $steamPlayerSummaries)
			//->with('loopId', $loopId)
			//->with('usersSteamId', $usersSteamId)
			//->with('steamPlayerSummary', $steamPlayerSummary)
			->with('limitedPlayers', $limitedPlayers);
			//->with('steamPlayerOwnedGames', $steamPlayerOwnedGames)
			//->with('steamPlayerLevelDetails', $steamPlayerLevelDetails);
	}

}
