@extends('app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">Geotagging</div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                 @if ($errors->has())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br>        
                    @endforeach
                </div>
                @endif
               
            </div>
        </div>             
        
        <div class="row">
            <div class="col-md-2">&nbsp;</div>
        </div>
		<div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-hover" id="datatable2">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Pemohon</th>
                            <th>Desa / Kelurahan</th>
                            <th>Luas Tanah</th>
                            <th>Rencana Kegiatan</th>
                        </tr>
                    </thead>
                    <tbody>
                      
                        @foreach ($geotag as $key => $value)
                        <tr>
                            <td>
                                <div style="margin-bottom: 5px;" class="btn-group">
                                    <button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">
                                    <i class="fa fa-cog"></i>
                                    <span class="caret"></span>
                                    </button>
                                    <ul role="menu" class="dropdown-menu">
                                        <li><a href="geotag-edit-{!! $value->objectid !!}"><i class="fa fa-pencil-square-o"></i> Edit</a></li>
                                        <li><a href="geotag-delete-{!! $value->objectid !!}"><i class="fa fa-trash-o"> Hapus</i></li>
                                        <li class="divider"></li>
                                      
                                    </ul>
                                </div>
                            </a>
                            </td>
                            <td>{{ $value->nama_pemohon }}</td>
                            <td>{{ $value->desa_kelurahan }}</td>
                            <td>{{ $value->luas_tanah }}</td>
                            <td>{{ $value->rencana_kegiatan }}</td>
                        </tr>
                        @endforeach              
                    </tbody>                  
                </table>
            </div>
        </div>
    </div>
</div>
@stop