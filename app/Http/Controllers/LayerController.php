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
//use App\Http\Controllers\Auth;
use DB;

class LayerController extends Controller {

	protected $baseurl;
	public function __construct() {
		$this->baseurl = url();
		$this->middleware('auth');
		
	}
	
	public function create(CreateLayerRequest $request) {
		
		//$destinationPath = public_path('images');
		//$fileName = str_random(20) . '.' . $request->file('image')->getClientOriginalExtension();
		try {
			$layer = new Layer;
			$layer->layername = $request->layername;
			$layer->layerurl = $request->layerurl;
			$layer->layer = $request->layer;
			$layer->na = $request->na;
			$layer->leveluser = $request->leveluser;
			$layer->grafik = $request->grafik;
			$layer->id_grouplayer = $request->id_grouplayer;
			$layer->orderlayer = $request->orderlayer;
			$layer->tipelayer = $request->tipelayer;
			$layer->featureaccess = $request->featureaccess;
			$layer->visible = $request->visible;
			$layer->option_visible = (bool)$request->option_visible;
			$layer->option_opacity = $request->option_opacity;
			$layer->jsonfield = $request->jsonfield;
			
			$layer->save();
		} catch (Exception $e) {
			DB::rollback();
		    throw $e;
		}

		try {
			if($request->level != null){
				$_rolelayer = $this->getlevel($layer->id_layer);
				foreach ($_rolelayer as $key => $value) {
					$detil = new RoleLayer();
					//$usermodul = DB::table('role_layer')->where('layer_id',$layer->id_layer)->delete();
					$detil->role_id = $value['role_id'];
					$detil->layer_id = $value['layer_id'];
					$detil->save();
				}
			}
		}catch (Exception $e) {
			DB::rollback();
		    throw $e;
		}
		

		//$request->file('image')->move($destinationPath, $fileName);

		return Redirect::to('layer')->with('message',\AHelper::format_message('Data Berhasil diubah','success'));
	}

	public function createSuccess() {
		
		$admin = \Auth::user();
		
		$title = 'Post Published';
		
		return view('layer.createsuccess')->with('title', $title)->with('admin', $admin);
	}

	public function manageExistingLayer() {

		$admin = \Auth::user();

		$layer = Layer::orderBy('orderlayer','asc')->get();

		$title = 'Layer';

		return view('layer.index')->with('title', $title)->with('layer', $layer)->with('admin', $admin);
	}

	public function delete($id) {

		$post = Layer::find($id);
		$identify =  Identify::where('layername' , '=', $post->layer);
		if ($identify !== null) {
			$identify->delete();
		}
		$post->delete();
		//\File::delete(public_path('images/' . $post->image));

		return redirect('layer/manage-existing-layer/delete/' . $id . '/success');
	}

	public function deleteSuccess() {
		
		$admin = \Auth::user();
		$title = 'Post Deleted';
		return view('layer.deletesuccess')->with('title', $title)->with('admin', $admin);
	}

	public function editExistingLayer($id) {

		$admin = \Auth::user();
		$layer = Layer::find($id);
		$title = 'Edit Existing Layer';
		$detil = $this->getVallevelmodul($id);
		$level = $this->GetDftrLevel($detil);

		return view('layer.edit')->with('title', $title)->with('layers', $layer)->with('admin', $admin)
		->with('level',$level);
	}

	//Pop Up Info
	public function showFormLayerInfo($id) {

		$admin = \Auth::user();
		$layer = Layer::find($id);
		$layer_ = $layer->layer;
		$title = 'Set Layer ';
		$field = json_decode($layer->jsonfield);
		
		return view('layer.settinglyr')->with('title', $title)
		->with('layers', $layer)->with('admin', $admin)
		->with('id',$id)
		->with('field',$field);

	}

	public function showFormLayerInfoPopUp($id,$idx,$layern) {
		$admin = \Auth::user();
		$layer = Layer::find($id);
		$identify = Identify::where('layerid' , '=', $idx)->where('layername', '=',$layern, 'AND')->first();
		$identify2 = $identify == null ? new Identify : $identify;
		$url = $this->baseurl;
		$field = json_decode($this->getfields($id,$idx));
		$title = 'Set Layer';

		return view('layer.settinglyrftr')
		->with('title', $title)
		->with('layers', $layer)
		->with('admin', $admin)
		->with('idx',$idx)
		->with('identify',$identify2)
		->with('url',$url)
		->with('field',$field);
		
		
	}

	public function getfields($id,$idx){
		$layer = Layer::find($id);
		$layers = json_decode($layer->jsonfield);
		foreach ($layers as $key => $value) {
			if ($value->id == $idx) {
				$field = $value;
			}
		}
		
		 return json_encode($field);
	}


	public function getfieldInfos(){
		$visible = \Input::get('visible');
		$nf = \Input::get('nf');
		$nalias = \Input::get('nalias');
		$label = \Input::get('label_field');
		$name = \Input::get('name_field');
		$array = array();
		$array2 = array();
		if ($visible != null) {
		
			foreach ($name as $i => $value) {
				
				$v = 0;
				//echo $i.' '.$visible[$i].' ';
				if (!isset($visible[$i])) {
					//array_push($visible, null);
					$visible[$i] = null;
				}
				$v = ($visible[$i] == null ? 0:1);
				//$v = array_key_exists($i, $visible) == false ? null: $visible[$i];
				
				$array['fieldName'] = $name[$i];
				$array['label'] = $label[$i];
				$array['visible'] = (bool)$v;
				array_push($array2,$array);
			}
		}

		return json_encode($array2);
	}

	public function getDesc(){
		$visible = \Input::get('visible');
		$nf = \Input::get('nf');
		$nalias = \Input::get('nalias');
		$label = \Input::get('label_field');
		$name = \Input::get('name_field');
		$html = '<table>';

		foreach ($visible as $i => $value) {
			$html .= '<tr><td><b>'.$label[$i].'</b></td><td>{'.$value.'}</td></tr>';
		}
		
		$html .= '</table>';

		return $html;
	}

	public function getMedias(){
		$title = \Input::get('title_m');
		$caption = \Input::get('caption_m');
		$url = \Input::get('url_m');
		$link = \Input::get('link_m');
		$type = \Input::get('type_m');

		$fields = \Input::get('field');
		
		$array = array();
		$array2 = array();
		$value = array();

		
			$array['title'] = $title;
			$array['caption'] = $caption;
			$array['type'] = $type; 
			if ($type == 'image') {
				$value['sourceURL'] = $url;
				$value['linkURL'] = $link;
			}else {
              	$value['fields'] = $fields;
			}
			

			$array['value'] = $value;
			array_push($array2,$array);
			
		
		return json_encode($array2);
	}

	public function postFormLayerInfoPopUpCr($id,$idx,$layern){
		$fieldinfo = $this->getfieldInfos();
		$medias = $this->getMedias();
		$desc = \Input::get('display') == 'keyvalue' ? $this->getDesc():\Input::get('description');
		$rules = array(
			'layername' => 'required',
	        
	    );
	    $validator = Validator::make(\Input::all(),$rules);
	    if ($validator->fails()) {
	    	// get the error messages from the validator
	        $messages = $validator->messages();

	        // redirect our user back to the form with the errors from the validator
	        return Redirect::to('layer')
	            ->withErrors($validator);
	    }else{
	    	$check = Identify::where('layerid' , '=', $idx)->where('layername', '=',$layern, 'AND')->first();
			if ($check === null) {
				$identify = new Identify;
				$identify->title = \Input::get('title');
				$identify->display = \Input::get('display');
				$identify->description = $desc;
				$identify->layername = \Input::get('layername');
				$identify->layerid = \Input::get('layerid');
				$identify->key_ = $fieldinfo;
				$identify->media = $medias;
				$identify->showattachments = \Input::get('showattachments');

				$identify->save();
				$msg = 'tambah';
			}else{
				
				$identify = $check;
				$identify->title = \Input::get('title');
				$identify->description = $desc;
				$identify->layername = \Input::get('layername');
				$identify->layerid = \Input::get('layerid');
				$identify->display = \Input::get('display');
				$identify->key_ = $fieldinfo;
				$identify->media = $medias;
				$identify->showattachments = \Input::get('showattachments');

				$identify->save();
				$identify->touch();
				$msg = 'edit';
			}
			//return $medias;
			//return $msg." ".$idx." ".$desc;
			return redirect('layer');
	    }
		
		
	}


	public function ajaxmedia(Request $request) {
		if(Request::ajax()) {
            $data = Input::all();
            print_r($data);
            die();
		}
		
	}

	

	public function edit(EditLayerRequest $request) {
		$na = ($request->na ? $request->na:'Y');
		$layer = Layer::find($request->id);

		$layer->layername = $request->layername;
		$layer->layerurl = $request->layerurl;
		$layer->layer = $request->layer;
		$layer->na = $na;
		$layer->orderlayer = $request->orderlayer;
		$layer->tipelayer = $request->tipelayer;
		$layer->featureaccess = $request->featureaccess;
		$layer->visible = $request->visible;
		$layer->option_visible = (bool)$request->option_visible;
		$layer->option_opacity = $request->option_opacity;
		$layer->jsonfield = $request->jsonfield;

		$layer->save();
		$layer->touch();

		try {
			if($request->level != null){
				$_rolelayer = $this->getlevel($layer->id_layer);
				$usermodul = DB::table('role_layer')->where('layer_id',$layer->id_layer)->delete();
				foreach ($_rolelayer as $key => $value) {
					$detil = new RoleLayer();
					
					$detil->role_id = $value['role_id'];
					$detil->layer_id = $value['layer_id'];
					$detil->save();
				}
			}
		}catch (Exception $e) {
			DB::rollback();
		    throw $e;
		}

		return Redirect::to('layer')->with('message',\AHelper::format_message('Data Berhasil diubah','info'));
	}

	public function editSuccess() {
		
		$admin = \Auth::user();

		$title = 'Post Updated';

		return view('layer.editsuccess')->with('title', $title)->with('admin', $admin);
	}

	public function viewAllLayer() {
		
		$admin = \Auth::user();

		$layer = Layer::orderBy('orderlayer','asc')->get();

		$title = 'View All Layer';

		

		return view('layer.index')->with('layers', $layer)->with('title', $title)->with('admin', $admin);
	}

	public function viewLayer($id) {

		$admin = \Auth::user();

		$layer = Layer::find($id);

		$title = 'View Layer';

		return view('viewpost')->with('layer', $layer)->with('title', $title)->with('admin', $admin);
	}

	public function createNewLayer() {

		$admin = \Auth::user();

		$title = 'Create New Layer';

		//$level = $this->getleveluser();
		$level = $this->GetDftrLevel();

		return view('layer.add')->with('title', $title)->with('admin', $admin)->with('level',$level);
	}

	public function index() {

		$admin = \Auth::user();

		$title = 'Admin Panel Home';

		return view('layer.index')->with('title', $title)->with('admin', $admin);

	}
	public function rolelayer(){

		$layers = Layer::all();
		return view('layer.rolelayer')->with('layers', $layers);
	}
	//DMS2Decimal-106-49-0.5731-E
	public function DMS2Decimal($degrees = 0, $minutes = 0, $seconds = 0, $direction = 'n') {
	     //converts DMS coordinates to decimal
	     //returns false on bad inputs, decimal on success
	      
	     //direction must be n, s, e or w, case-insensitive
	     $d = strtolower($direction);
	     $ok = array('n', 's', 'e', 'w');
	      
	     //degrees must be integer between 0 and 180
	     if(!is_numeric($degrees) || $degrees < 0 || $degrees > 180) {
	          $decimal = false;
	     }
	     //minutes must be integer or float between 0 and 59
	     elseif(!is_numeric($minutes) || $minutes < 0 || $minutes > 59) {
	          $decimal = false;
	     }
	     //seconds must be integer or float between 0 and 59
	     elseif(!is_numeric($seconds) || $seconds < 0 || $seconds > 59) {
	          $decimal = false;
	     }
	     elseif(!in_array($d, $ok)) {
	          $decimal = false;
	     }
	     else {
	          //inputs clean, calculate
	          $decimal = $degrees + ($minutes / 60) + ($seconds / 3600);
	           
	          //reverse for south or west coordinates; north is assumed
	          if($d == 's' || $d == 'w') {
	               $decimal *= -1;
	          }
	     }
	      
	     return $decimal;
	}


	public function getlevel($layerid=''){
		$levelform = \Input::get('level');
		$array = array();
		$array2 = array();
		if(empty($layerid)){
			return 'layerid kosong';
		}
		if($levelform != null){
			foreach ($levelform as $key => $value) {
				$array['layer_id'] = $layerid;
				$array['role_id'] = $value;
			
				array_push($array2,$array); 
			}
			return $array2;
		}
	}



	

	public function GetDftrLevel($lvl='') {
	
	  	$level = Role::orderBy('id','asc')->get();
	  	$a = '';
	  	foreach ($level as $key => $value) {
	  		$ck = (strpos($lvl, ".".$value->id) === false)? '' : 'checked';
	  		$a .= "<div class='checkbox c-checkbox'>";
	  		$a .= "<label><input type='checkbox' name='level[]' class='' value='$value->id' $ck><span class='fa fa-check'></span> $value->id - $value->name</label>";
	  		$a .= "</div>";
	  	} 
	  	return $a;
	}

	public function getVallevelmodul($layerid){
		$detil = RoleLayer::whereRaw('layer_id = ?',array($layerid))->get();
		$a='';
		foreach ($detil as $key => $value) {
			$a .= '.'.$value->role_id;
		}
		return $a;
	}

	public function LayerEsriHapus($id){
		$layer = Layer::find($id);
		$layer->jsonfield = null;
		$layer->save();
		return redirect('layer');
	}

}
