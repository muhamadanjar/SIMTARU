@extends('app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">{{ $title }}</div>
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
            <div class="col-md-2"><a href="layer-new-layer"><button class="btn btn-sm btn-primary">Tambah</button></a></div>
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
                            <th>Nama Layer</th>
                            <th>Layer</th>
                            <th>Tipe Layer</th>
                            <th>Layer URL</th>
                            <th> Status</th>

                        </tr>
                    </thead>
                    <tbody>
                      
                        @foreach ($layers as $key => $value)
                        <?php $disabled = ($value->jsonfield != null) ? '' : 'disabled' ;  ?>
                        <?php $aktif = ($value->na != 'N') ? 'alert alert-danger' : '' ;  ?>
                        <tr class="{{$aktif}}">
                            <td>
                            <!-- START button group-->
                            <div style="margin-bottom: 5px;" class="btn-group">
                                <button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">
                                <i class="fa fa-cog"></i>
                                <span class="caret"></span>
                                </button>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="layer/edit/{!! $value->id_layer !!}"><i class="fa fa-pencil-square-o"></i> Edit</a></li>
                                    <li data-form="#frmDelete-{{ $value->id_layer }}" 
                                        data-title="Hapus data layer {{ $value->layername }}" 
                                        data-message="apa anda yakin menghapus data layer {{ $value->layername }} ?">
                                        <a class= "formConfirm" href="#"><i class="fa fa-trash-o"></i> Hapus</a></li>
                                    {!! Form::open(array(
                                        'url' => route('layerdelete', array($value->id_layer)),
                                        'method' => 'get',
                                        'style' => 'display:none',
                                        'id' => 'frmDelete-'.$value->id_layer
                                    )) !!}
                                    {!! Form::close() !!}
                                    <li class="divider"></li>
                                    <li><a href="layerinfo/{!! $value->id_layer !!}"><i class="fa fa-bars"></i> Setting PopUp</a></li>
                                    
                                    <li class="{{$disabled}}" 
                                        data-form="#frmCEsri-{{ $value->id_layer }}" 
                                        data-title="Hapus data esri {{ $value->layername }}" 
                                        data-message="apa anda yakin menghapus data esri {{ $value->layername }} ?">
                                        <a class= "formConfirm" href="#"><i class="fa fa-bell" disabled></i> Hapus data Esri</a>

 
                                    </li>
                                    {!! Form::open(array(
                                        'url' => route('layeresrihapus', array($value->id_layer)),
                                        'method' => 'get',
                                        'style' => 'display:none',
                                        'id' => 'frmCEsri-'.$value->id_layer
                                    )) !!}
                                    {!! Form::close() !!}
                                </ul>
                            </div>
                            <!-- END button group-->

                            </td>
                            <td>{{ $value->layername }}</td>
                            <td>{{ substr($value->layer,0,10) }}</td>
                            <td>{{ ($value->tipelayer) }}</td>
                            <td><a href="{{ $value->layerurl }}">{{ substr($value->layerurl,5,30) }}</a></td>
                            <td>{{ $value->na }}</td>
                        </tr>
                        @endforeach              
                    </tbody>                  
                </table>
            </div>
        </div>
    </div>
</div>
@stop