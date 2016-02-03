<?php namespace App\Http\Controllers;

use Validator;
use Redirect;
use App\Layer;
use App\User;
use App\Role;
use App\LevelUser;
use App\RoleLayer;
use App\Identify;
use App\Http\Requests;
use App\Http\Requests\CreateLayerRequest;
use App\Http\Requests\EditLayerRequest;
/*use App\Http\Requests\CreateIdentifyRequest;
use App\Http\Requests\EditIdentifyRequest;*/
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\Http\Controllers\Auth;
use DB;


class SettingWeb extends Controller{
	
	public function __construct(){
		$this->middleware('auth');
	}

	public function SettingWebURLForm(){
		return view('taru.SettingUrl');
	}

	public function SettingWebURLPost(Request $request){
		$search = $request->search;
		$replace = $request->replace;
		$layers = Layer::orderBy('orderlayer','asc')->get();
		$array = array();
		foreach ($layers as $key => $l) {
			$array[$key] = str_replace($search, $replace, $l->layerurl);
			DB::table('Layers')->where('id_layer', $l->id_layer)->update(['layerurl' => $array[$key]]);
		}
		return Redirect::to('settingurl');
		
	}
}