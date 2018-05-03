<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model {
	
	// _token error fix
	protected $guarded = [];
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'polls';
	
	/**
	 * Has many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function answers()
	{
		return $this->hasMany('App\Answers');
	}
}
