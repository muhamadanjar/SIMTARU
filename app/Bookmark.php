<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model {
	
	protected $table = 'Bookmark';
	protected $fillable = [
		'name',
		'x_min',
		'y_min',
		'x_max',
		'y_max',
		'wkid'
	];
	protected $primaryKey = 'id';

}
