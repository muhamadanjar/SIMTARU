<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class LevelUser extends Model {

	protected $table = 'Level_Users';
	protected $fillable = ['user_level'];
	protected $primaryKey = 'iduserlevel';

}
