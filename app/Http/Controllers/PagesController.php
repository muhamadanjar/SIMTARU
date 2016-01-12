<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\GeoTag;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PagesController extends Controller {

	public $timestamps = false;
	public function about(){
	
		$data = [];
		$data[0] = 'Muhamad';
		$data[1] = 'Anjar';
		return view('page.about',compact('data'));
	}

	public function contact(){
	
		$data = [];
		$data['first'] = 'Muhamad';
		$data['last'] = 'Anjar';
		return view('page.contact',$data);
	}

	public function dashboard(){
		$admin = \Auth::user();
		return view('page.dashboard',compact('admin'));
	}

	public function useradminlist(){
		$admin = \Auth::user();
		$useradmin = User::all();
		return view('page.useradmin',compact('admin','useradmin'));
	}

	public function level(){
		$results = DB::select('select * from modul where id = ?', [1]);
		$sboleh = "select * from modul where script='".$page."'";
		    $rboleh = $conn->Execute($sboleh); $ktm = -1;
		    $RecordCount = $rboleh->RecordCount();
		    
		      	if ($RecordCount > 0) {
			        while ($wboleh = $rboleh->FetchRow()) {
			          @$pos = strpos($wboleh['leveluser'], $_SESSION['level']);
			          //$this->alert($wboleh['leveluser']." ".$_SESSION['level']);
			          if ($pos === false) {}
			          else $ktm = 1;
			        }
			        if ($ktm <= 0) {
			          echo "Anda Tidak Berhak Anda tidak berhak mengakses modul ini.<br />
			            Hubungi Sistem Administrator untuk memperoleh informasi lebih lanjut.
			            <hr size=1>
			            Pilihan: <a href='logout.php'>Logout</a>";
			        }
		        	else include_once $file.'.php';
		      	} else include_once $file.'.php';
	}

	public function formCapture(){
		return view('page.form.takephoto');
	}

	public function formCaptureGet($objectid,$crypt){
		return view('page.form.takephoto',compact('objectid','crypt'));
	}

	public function imagestring(){
		$data = $_POST['data'];
		$img = str_replace('data:image/png;base64,', '', $data);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		$filepng = uniqid() . '.png';
		$file = "./images/poi/". $filepng;
		$success = file_put_contents($file, $data);
		print $success ? $filepng : 'Unable to save the file.'.$data;
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

}
