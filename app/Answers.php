<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Answers extends Model {
	// _token error fix
	protected $guarded = [];
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'answers';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'answer',
		'poll_id',
	];
	
	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function poll()
	{
		return $this->belongsTo('App\Poll');
	}
	
	/**
	 * Has many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function pollvotes()
	{
		return $this->hasMany('App\PollVotes');
	}
}
