<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PollVotes extends Model {

	// _token error fix
	protected $guarded = [];
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'answers_id',
		'users_id',
	];
	
	/**
	 * Has many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function users()
	{
		return $this->hasMany('App\User');
	}
	
	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function answers()
	{
		return $this->belongsTo('App\Answers');
	}

}
