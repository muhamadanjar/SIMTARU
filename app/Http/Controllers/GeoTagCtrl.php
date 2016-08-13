<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\GeoTag;
use Illuminate\Http\Request;

class GeoTagCtrl extends Controller {

	public function __construct(){
		$this->middleware('auth');
	}
	public function index(){
		$GeoTag = GeoTag::orderBy('objectid','asc')->get();
		return view('taru.TaruList')->with('geotag',$GeoTag);
	}


	public function create(){
		
	}

	public function store(Request $request){
		$GeoTag = new GeoTag();
		$GeoTag->nama_pemohon = $request->nama_pemohon;
		$GeoTag->alamat = $request->alamat;
		$GeoTag->desa_kelurahan= $request->desa_kelurahan;
		$GeoTag->kecamatan= $request->kecamatan;
		$GeoTag->luas_tanah= $request->luas_tanah;
		$GeoTag->rencana_kegiatan= $request->rencana_kegiatan;
		$GeoTag->status_tanah= $request->status_tanah;
		$GeoTag->peta_bidang_tanah= $request->peta_bidang_tanah;
		$GeoTag->jumlah_titik_kordinat= $request->jumlah_titik_kordinat;
		$GeoTag->pengukuran_gsb= $request->pengukuran_gsb;
		$GeoTag->pengukuran_gsp= $request->pengukuran_gsp;
		$GeoTag->pengukuran_gsj= $request->pengukuran_gsj;
		$GeoTag->kondisi_eksisting= $request->kondisi_eksisting;
		$GeoTag->kondisi_sekitar_utara= $request->kondisi_sekitar_utara;
		$GeoTag->kondisi_sekitar_selatan= $request->kondisi_sekitar_selatan;
		$GeoTag->kondisi_sekitar_barat= $request->kondisi_sekitar_barat;
		$GeoTag->kondisi_sekitar_timur= $request->kondisi_sekitar_timur;
		$GeoTag->jarak_bangunan_lainnya= $request->jarak_bangunan_lainnya;
		$GeoTag->akses_jalan_masuk= $request->akses_jalan_masuk;
		$GeoTag->lebar_jalan_masuk= $request->lebar_jalan_masuk;
		$GeoTag->penataan_sistem_drainase= $request->penataan_sistem_drainase;
		$GeoTag->kemiringan_lahan= $request->kemiringan_lahan;
		$GeoTag->sketsa= $request->sketsa;
		$GeoTag->foto= $request->foto;
		$GeoTag->save();
	}


	public function show($id){
		//
	}


	public function edit($id){
		$GeoTag = GeoTag::find($id);
		return view('taru.TaruEdit')->with('geotag',$GeoTag);
	}


	public function update(Request $request){
		
		$this->validate($request, [
            'luas_tanah'=> 'numeric',
            'jumlah_titik_koordinat' => 'numeric',
            'lebar_jalan_masuk' => 'numeric',
            'jarak_bangunan_lainnya' => 'numeric'
        ]);
		$GeoTag = GeoTag::find($request->objectid);
		$GeoTag->nama_pemohon = $request->nama_pemohon;
		$GeoTag->alamat = $request->alamat;
		$GeoTag->desa_kelurahan= $request->desa_kelurahan;
		$GeoTag->kecamatan= $request->kecamatan;
		$GeoTag->luas_tanah= $request->luas_tanah;
		$GeoTag->rencana_kegiatan= $request->rencana_kegiatan;
		$GeoTag->status_tanah= $request->status_tanah;
		$GeoTag->peta_bidang_tanah= $request->peta_bidang_tanah;
		$GeoTag->jumlah_titik_koordinat= $request->jumlah_titik_koordinat;
		$GeoTag->pengukuran_gsb= $request->pengukuran_gsb;
		$GeoTag->pengukuran_gsp= $request->pengukuran_gsp;
		$GeoTag->pengukuran_gsj= $request->pengukuran_gsj;
		$GeoTag->kondisi_eksisting= $request->kondisi_eksisting;
		$GeoTag->kondisi_sekitar_utara= $request->kondisi_sekitar_utara;
		$GeoTag->kondisi_sekitar_selatan= $request->kondisi_sekitar_selatan;
		$GeoTag->kondisi_sekitar_barat= $request->kondisi_sekitar_barat;
		$GeoTag->kondisi_sekitar_timur= $request->kondisi_sekitar_timur;
		$GeoTag->jarak_bangunan_lainnya= $request->jarak_bangunan_lainnya;
		$GeoTag->akses_jalan_masuk= $request->akses_jalan_masuk;
		$GeoTag->lebar_jalan_masuk= $request->lebar_jalan_masuk;
		$GeoTag->penataan_sistem_drainase= $request->penataan_sistem_drainase;
		$GeoTag->kemiringan_lahan= $request->kemiringan_lahan;
		$GeoTag->sketsa= $request->sketsa;
		//$GeoTag->foto= $request->foto;
		$file = $request->file('foto');
		if(!empty($file)){
			\File::delete(public_path('images/' . $GeoTag->foto));
			$destinationPath = public_path('images').'/poi';
			//$fileName = $file->getClientOriginalName();
			$fileName = str_random(20) . '.' . $file->getClientOriginalExtension();
			$pathFilename = 'images/poi/'.$fileName;
			$file->move($destinationPath, $fileName);
			$GeoTag->foto = $fileName;
		}
		$GeoTag->save();

		return redirect('geotag-list');
	}

	public function destroy($id){
		$GeoTag = GeoTag::find($id);
		$GeoTag->delete();
		return redirect('geotag-list');
	}

}
