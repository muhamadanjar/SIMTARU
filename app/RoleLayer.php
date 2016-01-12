<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleLayer extends Model {

	protected $table = 'role_layer';
	protected $primaryKey = 'layer_id';
	public $timestamps = false;

}
