<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Identify extends Model {

	protected $table = 'Identify';
	protected $fillable = [
		'layerid',
		'layername'
		
	];
	protected $primaryKey = 'id_identify';

}

