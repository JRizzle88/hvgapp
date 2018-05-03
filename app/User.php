<?php namespace App;

use Auth;
use Steam;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract {

	use Authenticatable, Authorizable, CanResetPassword;

	// _token error fix
	protected $guarded = ['email'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'player_name',
		'email',
		'password',
		'first_name',
		'last_name',
		'city',
		'state',
		'phone',
		'steam',
		'twitch',
		'origin',
		'linkedin',
		'twitter',
		'facebook',
		'googleplus',
		'skype',
		'github',
		'player_cpu',
		'player_ram',
		'player_video_card',
		'player_monitor',
	    'player_periphials',
	    'player_mobile_devices',
	    'favorite_sites',
	];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	/**
	 * The super admin role
	 *
	 * @var string super_admin
	 */
	public function isSuperAdmin()
	{
	    return $this->role === 'super_admin';
	}

	/**
	 * The author role
	 *
	 * @var string author
	 */
	public function isAuthor()
	{
	    return $this->role === 'author';
	}

	/**
	 * The player role
	 *
	 * @var string player
	 */
	public function isPlayer()
	{
	    return $this->role === 'player';
	}

	public function isMember()
	{
		if ( Auth::user()->isPlayer() || Auth::user()->isAuthor() || Auth::user()->isSuperAdmin() )
		{
			return true;
		}
	}

	/**
	 * Has many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function pages()
	{
		return $this->hasMany('App\Page');
	}

	/**
	 * Has many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function posts()
	{
		return $this->hasMany('App\Post');
	}

	/**
	 * Has many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function comments()
	{
		return $this->hasMany('App\Comment');
	}


}
