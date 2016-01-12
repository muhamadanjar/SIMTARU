@extends('app')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">{{ $title }}</div>
    <div class="panel-body">             
        <div class="row">
            <div class="col-md-12">
                    @if ($errors->any())
                        <div class="alert alert-dismissible alert-danger">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            All fields must be filled included.
                        </div>
                    @else
                        <div class="alert alert-dismissible alert-info">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            You can create a new layer here.
                        </div>
                    @endif
                    
                    {!! Form::open(['class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            {!! Form::label('layer', 'Layer', ['class' => 'col-md-2 control-label-kiri']) !!}
                            <div class="col-md-3">
                                {!! Form::text('layer', $layers->layer, ['class' => 'form-control', 'placeholder' => "Layer ID"]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="layername" class="col-md-2 control-label-kiri">Layer Name</label>
                            <div class="col-md-8">
                                 {!! Form::text('layername', $layers->layername, ['class' => 'form-control', 'placeholder' => "Nama Layer"]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="layerurl" class="col-md-2 control-label-kiri">Layer URL</label>
                            <div class="col-md-8">
                                 {!! Form::text('layerurl', $layers->layerurl, ['id' => 'layerurl','class' => 'form-control', 'placeholder' => "Layer Url"]) !!}
                            </div>
                            <div class="col-sm-1"><button id="btn-load-layerurl" type="button" class="btn btn-default">Load Data</button></div>
                        </div>

                        <div class="form-group">
                            <label for="na" class="col-md-2 control-label-kiri">Tidak Aktif</label>
                            <div class="col-md-5">
                                <div class='checkbox c-checkbox'>
                                    <label>{!! Form::checkbox('na', 'N', ['class' => 'form-control']) !!}<span class='fa fa-check'></span></label>
                                </div>

                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-2 control-label-kiri">Hak Akses</label>
                            <div class="col-md-3">
                                {!! $level !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="orderlayer" class="col-md-2 control-label-kiri">Order Layer</label>
                            <div class="col-md-2">
                                 {!! Form::text('orderlayer', $layers->orderlayer, ['class' => 'form-control', 'placeholder' => "Your post's title here"]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="orderlayer" class="col-md-2 control-label-kiri">Tipe Layer</label>
                            <div class="col-md-5">
                                 <select name="tipelayer" class="form-control">
                                    <option value="-">-----------</option>
                                    @if($layers->tipelayer =='dynamic')
                                        <option value="dynamic" selected="selected">dynamic</option>
                                        <option value="feature">feature</option>
                                    @elseif($layers->tipelayer =='feature')
                                        <option value="dynamic">dynamic</option>
                                        <option value="feature" selected="selected">feature</option>
                                    @else
                                        <option value="dynamic">dynamic</option>
                                        <option value="feature">feature</option>
                                    @endif
                                 </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="orderlayer" class="col-md-2 control-label-kiri">Feature Access</label>
                            <div class="col-md-2">
                                 {!! Form::text('featureaccess', $layers->featureaccess, ['class' => 'form-control', 'placeholder' => "Feature Acces"]) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="visible" class="col-md-2 control-label-kiri">Visible</label>
                            <div class="col-md-5">
                                <select name="visible" class="form-control">
                                    <option value="-">------</option>
                                @if($layers->visible =='viewer')
                                    <option value="viewer" selected="selected">Viewer</option>
                                    <option value="editor">Editor</option>
                                @elseif($layers->visible =='editor')
                                    <option value="viewer">Viewer</option>
                                    <option value="editor" selected="selected">Editor</option>
                                @else
                                    <option value="viewer">Viewer</option>
                                    <option value="editor">Editor</option>
                                @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="visible" class="col-md-2 control-label-kiri">Visible Layer</label>
                            <div class="col-md-5">
                            	<div class="checkbox c-checkbox">
                                @if($layers->option_visible)
                                	<label><input type="checkbox" name="option_visible" value="1" checked><span class="fa fa-check"></span></label>
                                @else
                                	<label><input type="checkbox" name="option_visible" value="0"><span class="fa fa-check"></span></label>
                                @endif
                                </div>
                               
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="visible" class="col-md-2 control-label-kiri">Opacity</label>
                            <div class="col-md-1">
                                {!! Form::text('option_opacity',$layers->option_opacity ,['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <input type="hidden" name="jsonfield" id="jsonfield" value="{{ $layers->jsonfield }}">

                        
                        
                        <div class="form-group">
                            <div class="col-md-11 col-md-offset-1">
                                <a href="{{ action('LayerController@viewAllLayer') }}" class="btn btn-default">Reset</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                    <script type="text/javascript" src="{{ asset('3.12compact/init.js')}}"></script>
                    <script type="text/javascript" src="{{ asset('js/esriGetFields.js') }}"></script>

                    
                    
            </div>
        </div>
    </div>
</div>
@stop