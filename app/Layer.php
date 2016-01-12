<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Layer extends Model {

	protected $table = 'Layers';
	protected $fillable = [
		'layername',
		'layerurl',
		'layer',
		'na',
	
	
		'id_grouplayer',
		'orderlayer',
		'tipelayer'


	];
	protected $primaryKey = 'id_layer';
	protected $hidden = ['jsonfield'];

	public function roles()
    {
        return $this->belongsToMany('App\Role','role_layer');
    }

    public function assignRole($role){
        return $this->roles()->attach($role);
    }
     
    public function revokeRole($role){
        return $this->roles()->detach($role);
    }

    public function hasRole($name)
    {
        foreach($this->roles as $role)
        {
            if ($role->name === $name) return true;
        }
        return false;
    }

}

