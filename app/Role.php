<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

	public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function layers()
    {
        return $this->belongsToMany('App\Layer');
    }

    
}
