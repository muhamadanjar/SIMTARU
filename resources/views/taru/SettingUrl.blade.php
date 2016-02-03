@extends('app')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Update URL</div>
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
                        
                        <div class="form-group">
                            <label for="search" class="col-md-2 control-label-reverse">Cari URL</label>
                            <div class="col-md-8">
                                 {!! Form::text('search', '', ['class' => 'form-control', 'placeholder' => "Cari Server host"]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="replace" class="col-md-2 control-label-reverse">Ganti URL</label>
                            <div class="col-md-8">
                                 {!! Form::text('replace', '', ['class' => 'form-control', 'placeholder' => "Ganti Server host"]) !!}
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