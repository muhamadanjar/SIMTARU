<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Modul extends Model {
	
	protected $table = 'modul';
	protected $fillable = [
		'modul',
		'leveluser',
		'na'

		
	];
	protected $primaryKey = 'id';

}
