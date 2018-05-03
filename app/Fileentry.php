<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Fileentry extends Model {
	// _token error fix
	protected $guarded = [];

	protected $table = 'fileentries';
}
