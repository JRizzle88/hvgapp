<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {
	// _token error fix
	protected $guarded = [];
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'posts';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'user_id',
		'name',
		'content',
		'featured_image',
		'slug',
		'seo_title',
		'seo_description',
		'seo_keywords',
		'draft',
	];
	
	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user()
	{
		return $this->belongsTo('App\User');
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
