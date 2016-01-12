@extends('app')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">GeoTagging</div>
    <div class="panel-body">             
        <div class="row">
            <div class="col-md-12">
                    @if ($errors->any())
                        <div class="alert alert-dismissible alert-danger">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            Semua data harus diisi.
                        </div>
                    @else
                        
                    @endif
                    
                    {!! Form::open(['class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data']) !!}
                        <input type="hidden" name="objectid" value="{{ $geotag->objectid }}">
                        <div class="form-group">
                            {!! Form::label('nama_pemohon', 'Nama Pemohon', ['class' => 'col-md-2 control-label-reverse']) !!}
                            <div class="col-md-3">
                                {!! Form::text('nama_pemohon', $geotag->nama_pemohon, ['class' => 'form-control', 'placeholder' => "Nama Pemohon"]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamat" class="col-md-2 control-label-reverse">Alamat</label>
                            <div class="col-md-8">
                                 {!! Form::text('alamat', $geotag->alamat, ['class' => 'form-control', 'placeholder' => "Alamat"]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="desa_kelurahan" class="col-md-2 control-label-reverse">Desa Kelurahan</label>
                            <div class="col-md-8">
                                 {!! Form::text('desa_kelurahan', $geotag->desa_kelurahan, ['id' => 'desa_kelurahan','class' => 'form-control', 'placeholder' => "Desa kelurahan"]) !!}
                            </div>
                            
                        </div>

                        <div class="form-group">
                            <label for="na" class="col-md-2 control-label-reverse">Kecamatan</label>
                            <div class="col-md-8">
                                {!! Form::text('kecamatan', $geotag->kecamatan, ['id' => 'kecamatan','class' => 'form-control', 'placeholder' => "Kecamatan"]) !!}

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="luas_tanah" class="col-md-2 control-label-reverse">Luas tanah</label>
                            <div class="col-md-2">
                                 {!! Form::text('luas_tanah', $geotag->luas_tanah, ['class' => 'form-control', 'placeholder' => "Your post's title here"]) !!}
                            </div>
                        </div>
                        

                        <div class="form-group">
                            <label for="rencana_kegiatan" class="col-md-2 control-label-reverse">Rencana Kegiatan</label>
                            <div class="col-md-5">
                                 {!! Form::text('rencana_kegiatan', $geotag->rencana_kegiatan, ['class' => 'form-control', 'placeholder' => "Rencana Kegiatan"]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="status_tanah" class="col-md-2 control-label-reverse">Status Tanah</label>
                            <div class="col-md-3">
                                 {!! Form::text('status_tanah', $geotag->status_tanah, ['class' => 'form-control', 'placeholder' => "Status tanah"]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="peta_bidang_tanah" class="col-md-2 control-label-reverse">Peta Bidang Tanah</label>
                            <div class="col-md-3">
                                 {!! Form::text('peta_bidang_tanah', $geotag->peta_bidang_tanah, ['class' => 'form-control', 'placeholder' => "Peta Bidang tanah"]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="jumlah_titik_koordinat" class="col-md-2 control-label-reverse">jumlah titik kordinat</label>
                            <div class="col-md-1">
                                 {!! Form::text('jumlah_titik_koordinat', $geotag->jumlah_titik_koordinat, ['class' => 'form-control', 'placeholder' => "Your post's title here"]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="pengukuran_gsb" class="col-md-2 control-label-reverse">Pengukuran GSB</label>
                            <div class="col-md-3">
                                 {!! Form::text('pengukuran_gsb', $geotag->pengukuran_gsb, ['class' => 'form-control', 'placeholder' => "Pengukuran GSB"]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="pengukuran_gsp" class="col-md-2 control-label-reverse">Pengukuran GSP</label>
                            <div class="col-md-3">
                                 {!! Form::text('pengukuran_gsp', $geotag->pengukuran_gsp, ['class' => 'form-control', 'placeholder' => "Pengukuran GSP"]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="pengukuran_gsj" class="col-md-2 control-label-reverse">Pengukuran GSJ</label>
                            <div class="col-md-3">
                                 {!! Form::text('pengukuran_gsj', $geotag->pengukuran_gsj, ['class' => 'form-control', 'placeholder' => "Pengukuran GSJ"]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="kondisi_eksisting" class="col-md-2 control-label-reverse">Kondisi Eksisting</label>
                            <div class="col-md-5">
                                 {!! Form::text('kondisi_eksisting', $geotag->kondisi_eksisting, ['class' => 'form-control', 'placeholder' => "Kondisi Eksisting"]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="kondisi_sekitar_utara" class="col-md-2 control-label-reverse">Kondisi Sekitar Utara</label>
                            <div class="col-md-5">
                                 {!! Form::text('kondisi_sekitar_utara', $geotag->kondisi_sekitar_utara, ['class' => 'form-control', 'placeholder' => "Kondisi Sekitar Utara"]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="kondisi_sekitar_selatan" class="col-md-2 control-label-reverse">Kondisi Sekitar Selatan</label>
                            <div class="col-md-5">
                                 {!! Form::text('kondisi_sekitar_selatan', $geotag->kondisi_sekitar_selatan, ['class' => 'form-control', 'placeholder' => "Kondisi Sekitar Selatan"]) !!}
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="kondisi_sekitar_barat" class="col-md-2 control-label-reverse">Kondisi Sekitar Barat</label>
                            <div class="col-md-5">
                                 {!! Form::text('kondisi_sekitar_barat', $geotag->kondisi_sekitar_barat, ['class' => 'form-control', 'placeholder' => "Kondisi Sekitar Barat"]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kondisi_sekitar_timur" class="col-md-2 control-label-reverse">Kondisi Sekitar Timur</label>
                            <div class="col-md-5">
                                 {!! Form::text('kondisi_sekitar_timur', $geotag->kondisi_sekitar_timur, ['class' => 'form-control', 'placeholder' => "Kondisi Sekitar Timur"]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="jarak_bangunan_lainnya" class="col-md-2 control-label-reverse">Jarak Bangunan lainnya</label>
                            <div class="col-md-1">
                                 {!! Form::text('jarak_bangunan_lainnya', $geotag->jarak_bangunan_lainnya, ['class' => 'form-control', 'placeholder' => "Jarak Bangunan lainnya"]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="akses_jalan_masuk" class="col-md-2 control-label-reverse">Akses Jalan Masuk</label>
                            <div class="col-md-5">
                                 {!! Form::text('akses_jalan_masuk', $geotag->akses_jalan_masuk, ['class' => 'form-control', 'placeholder' => "Akses Jalan Masuk"]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="lebar_jalan_masuk" class="col-md-2 control-label-reverse">Lebar Jalan masuk</label>
                            <div class="col-md-1">
                                 {!! Form::text('lebar_jalan_masuk', $geotag->lebar_jalan_masuk, ['class' => 'form-control', 'placeholder' => "Lebar Jalan Masuk"]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="penataan_sistem_drainase" class="col-md-2 control-label-reverse">Penataan Sistem drainase</label>
                            <div class="col-md-8">
                                 {!! Form::text('penataan_sistem_drainase', $geotag->penataan_sistem_drainase, ['class' => 'form-control', 'placeholder' => "Penataan sistem drainase"]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="kemiringan_lahan" class="col-md-2 control-label-reverse">Kemiringan Lahan</label>
                            <div class="col-md-6">
                                 {!! Form::text('kemiringan_lahan', $geotag->kemiringan_lahan, ['class' => 'form-control', 'placeholder' => "Kemiringan Lahan"]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sketsa" class="col-md-2 control-label-reverse">Sketsa</label>
                            <div class="col-md-5">
                                 {!! Form::text('sketsa', $geotag->sketsa, ['class' => 'form-control', 'placeholder' => "Sketsa"]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sketsa" class="col-md-2 control-label-reverse">Foto</label>
                            <div class="col-md-5">
                                <input type="file" name="foto" class="" id="foto"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-11 col-md-offset-1">
                                <a href="{{ action('GeoTagCtrl@index') }}" class="btn btn-default">Reset</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
            

                    
                    
            </div>
        </div>
    </div>
</div>
@stop