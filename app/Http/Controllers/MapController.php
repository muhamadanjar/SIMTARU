<?php namespace App\Http\Controllers;

use App\Layer;
use App\Identify;
use App\User;
use App\Bookmark;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class MapController extends Controller {
    public $admin;

    public function __construct() {
		$this->middleware('auth',['except' => ['index','viewer','Getlayer','GetIdentify','LayerUser','vieweruser']]);
		$admin = \Auth::user();
	}

	public function index(){
		$useragent=$_SERVER['HTTP_USER_AGENT'];
		if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
		$web = $this->viewerusermobile();
		else $web = $this->vieweruser();
		return $web;
	}

	public function map(){
		$admin = \Auth::user();
		$layers = Layer::all();
		
		$op = ($admin ? $this->getOpLyrEditor() : $this->getOpLyr());
		$bm  = $this->GetBookmark();
		$idn = $this->GetIdentify();
		$editor = ($admin ? 1 : 0);
		//$userlevel = \Auth::user()->hasRole('admin');
		return view('map.viewer',compact('admin','layers','op','bm','idn','editor'));
	}

	public function vieweruser(){
		$admin = \Auth::user();
		$layers = Layer::all();
		
		$op = $this->LayerUser();
		$bm  = $this->GetBookmark();
		$idn = $this->GetIdentify();
		$editor = ($admin ? 1 : 0);
		$printstatus = ($admin ? 1 : 0);
		//$userlevel = \Auth::user()->hasRole('admin');
		return view('map.vieweruser',compact('admin','layers','op','bm','idn','editor','printstatus'));
	}

	public function viewerusermobile(){
		$admin = \Auth::user();
		$layers = Layer::all();
		
		$op = $this->LayerUser();
		$bm  = $this->GetBookmark();
		$idn = $this->GetIdentify();
		$editor = ($admin ? 1 : 0);
		$printstatus = ($admin ? 1 : 0);
		//$userlevel = \Auth::user()->hasRole('admin');
		return view('map.viewer-mobile',compact('admin','layers','op','bm','idn','editor','printstatus'));
	}
	


	public function GetBookmark(){
		$bookmarks = Bookmark::all();

		$extent = array();
		$name = array();
		$bookmark = array();
		$array = array();
		foreach ($bookmarks as $key => $value) {
			$extent['xmin'] = (float) $value['x_min'];
			$extent['ymin'] = (float) $value['y_min'];
			$extent['xmax'] = (float) $value['x_max'];
			$extent['ymax'] = (float) $value['y_max'];
			$extent['spatialReference']['wkid'] = (int) $value['wkid'];
			$bookmark['extent'] = $extent;
			$bookmark['name'] = $value['name'];
			array_push($array, $bookmark);
	
		}

		return json_encode($array);

	}

	public function GetIdentify(){
		//$identify = Identify::all();
		$identify = $this->GetTableCanEdit();
		$url = url();
		$link = '';
		$arrayname = array();
		$arraylayerid = array();
		$arrayfieldinfo = array(); $arrayfieldinfos = array();
		$n = array();
		foreach ($identify as $key => $value) {
			unset($arraylayerid);
			unset($arrayfieldinfos);
			$kodec = base64_encode($value['tablename']);
			$value['key_'] = json_decode($value['key_']);
			$value['media'] = json_decode($value['media']);
			$arrayfieldinfo = $value['key_'];
			if (\Auth::user()) {
				if ($value['tablename']!=null) {
					$link = '<a href="'.$url.'/form-capture-{objectid}-'.$kodec.'"><button class="btn"><i class="fa fa-camera"></i> Photo</button></a>';
				}
			}
			
			
			$arrayfieldinfos['title'] = $value->title;
			if ($value['display'] == 'keyvalue') {
				$arrayfieldinfos['fieldInfos'] = $arrayfieldinfo;
			}else{
				$arrayfieldinfos['description'] = $value['description'].$link;
			}
			$arrayfieldinfos['showAttachments'] = $value['showattachments'];
			$arrayfieldinfos['mediaInfos'] = $value['media'];
			$arrayfieldinfos['editinfo'] = $value['id_identify'].'|'.(base64_encode($value['tablename']));

		
			$arraylayerid[(int)$value['layerid']] = $arrayfieldinfos;
			if(array_key_exists($value['layername'],$arrayname)){
				$arrayname[$value['layername']] += $arraylayerid;
			}else{
				$arrayname[$value['layername']] = $arraylayerid;
			}

		}

		return json_encode($arrayname);
	}

	public function GetTableCanEdit(){
        $query = Identify::leftJoin('identify_table', function($join) {
	      $join->on('Identify.id_identify', '=', 'identify_table.id_identify');
	    })->get([
	        'Identify.id_identify',
	        'Identify.title',
	        'Identify.layername',
	        'Identify.layerid',
	        'Identify.display',
	        'Identify.description',
	        'Identify.key_',
	        'Identify.media',
	        'Identify.showattachments',
	        'identify_table.tablename'
	    ]);



        return $query;
	}

	public function getOpLyr(){
		$layers = Layer::orderBy('orderlayer','DESC');
		$layers_ =$layers->get();
		$admin = \Auth::user();
		$array = array(); $operationallayer = array();
		foreach ($layers_ as $key => $value) {
			if ($value->na == 'N') {
				if ($value->visible == 'viewer') {

					$optionfeature['id'] = $value->layer;
					$optionfeature['opacity'] = 1.0;
					$optionfeature['visible'] = false;
					$optionfeature['outFields'] = ['*'];
					$optionfeature['mode'] = 1;
			        
			        $optiondynamic['id'] = $value->layer;  
			        $optiondynamic['opacity'] = $value->option_opacity;
			        $optiondynamic['visible'] = $value->option_visible;
			        $optiondynamic['outFields'] = ['*'];
			        $optiondynamic['imageParameters'] = '';
			       
			        $options = ($value->tipelayer=='dynamic' ?  $optiondynamic : $optionfeature); 

			        $operationallayer_['type'] = $value->tipelayer;
			        $operationallayer_['url'] =  $value->layerurl;
			        $operationallayer_['title'] = $value->layername;
			        $operationallayer_['options'] = $options;
			        $layerIds = ['layerIds' => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22]];
			        $operationallayer_['identifyLayerInfos'] = $layerIds;
			        array_push($operationallayer, $operationallayer_);
	
				} // end viewer
			}	//end non aktif
		}
		return json_encode($operationallayer);
	}

	public function getOpLyrEditor(){
		$layers = Layer::all();
		$admin = \Auth::user();
		$array = array(); $operationallayer = array();
		foreach ($layers as $key => $value) {
			if ($value->na == 'N') {
				if ($value->visible == 'editor') {

					$optionfeature['id'] = $value->layer;
					$optionfeature['opacity'] = 1.0;
					$optionfeature['visible'] = true;
					$optionfeature['outFields'] = ['*'];
					$optionfeature['mode'] = 1;
			        
			        $optiondynamic['id'] = $value->layer;  
			        $optiondynamic['opacity'] = 1.0;
			        $optiondynamic['visible'] = true;
			        $optiondynamic['outFields'] = ['*'];
			        $optiondynamic['imageParameters'] = '';
			       
			        $options = ($value->tipelayer=='dynamic' ?  $optiondynamic : $optionfeature); 

			        $operationallayer_['type'] = $value->tipelayer;
			        $operationallayer_['url'] =  $value->layerurl;
			        $operationallayer_['title'] = $value->layername;
			        $operationallayer_['options'] = $options;
			        $layerIds = ['layerIds' => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22]];
			        $operationallayer_['identifyLayerInfos'] = $layerIds;
			        array_push($operationallayer, $operationallayer_);
	
				} // end viewer
			}	//end non aktif
		}
		return json_encode($operationallayer);
	}

	public function LayerUser(){
		$user = \Auth::user();
		$guest = \Auth::guest();
		$currentroleuser = ($user ? $user->roles:'');
		$userid = ($user ? $user->id : 0);
			$layers = Layer::join('role_layer',function($join) {
	      		$join->on('Layers.id_layer', '=', 'role_layer.layer_id');
	    	})->where('na','=','N')
	    	->where('role_layer.role_id','=',$userid)
	    	->with('roles')->orderBy('orderlayer','DESC');
		
		$sql = $layers->toSql();
		$run_layers = $layers->get();
		
		$array = array(); $operationallayer = array();
		
		
			foreach ($run_layers as $klyr => $layer) {
				$optionfeature['id'] = $layer->layer;
				$optionfeature['opacity'] = $layer->option_opacity;
				$optionfeature['visible'] = $layer->option_visible;
				$optionfeature['outFields'] = ['*'];
				$optionfeature['mode'] = 1;
			        
			    $optiondynamic['id'] = $layer->layer;  
			    $optiondynamic['opacity'] = $layer->option_opacity;
			    $optiondynamic['visible'] = $layer->option_visible;
			    $optiondynamic['outFields'] = ['*'];
			    $optiondynamic['imageParameters'] = '';
			       
			    $options = ($layer->tipelayer=='dynamic' ?  $optiondynamic : $optionfeature); 

			    $operationallayer_['type'] = $layer->tipelayer;
			    $operationallayer_['url'] =  $layer->layerurl;
			    $operationallayer_['title'] = $layer->layername;
			    $operationallayer_['options'] = $options;
			    $layerIds = ['layerIds' => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22]];
			    $operationallayer_['identifyLayerInfos'] = $layerIds;
			    $operationallayer_['roles'] = $layer->roles;
			    array_push($operationallayer, $operationallayer_);
			}
		
		return json_encode($operationallayer);

	}


	public function editGeotagFoto(Request $request) {

		$objectid = $request->objectid;
		$foto = $request->foto;
		if($request->ajax()){
            $GeoTag = GeoTag::where('objectid' , '=', $objectid)->first();
            $GeoTag->foto = $foto;
			//$GeoTag->personil = \Auth::user()->name;
			//$GeoTag->tanggal = Carbon::now();
			$GeoTag->save();

        }

		print($objectid.' - '.$foto);

	}



	public function GetTableHtml($attrName = 'OBJECTID'){
		$attrNames = explode(',', $attrName);
		$table ='<table class="attrTable">
			<tbody>
				<tr valign="top">
					<td class="attrName">OBJECTID</td>
					<td class="attrValue"><span class="esriNumericValue">1</span></td></tr>';

		foreach ($attrNames as $key => $value) {
			$table += '<tr valign="top">
					<td class="attrName">OBJECTID</td>
					<td class="attrValue"><span class="esriNumericValue">1</span></td></tr>';
		}
		$table += '</tbody></table>';
		print $table;
	}

	

}
