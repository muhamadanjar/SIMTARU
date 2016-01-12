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
                            All fields must be filled .</div>
                    @else
                        <div class="alert alert-dismissible alert-info">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            You can create a new layer here.
                        </div>
                    @endif
                    {!! Form::open(['class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            {!! Form::label('name', 'Nama Bookmark', ['class' => 'col-md-2 control-label-kiri']) !!}
                            <div class="col-md-8">
                                {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        
                        <div class="form-group">
                            {!! Form::label('x_min', 'X min', ['class' => 'col-md-2 control-label-kiri']) !!}
                            <div class="col-md-8">
                                {!! Form::text('x_min', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('y_min', 'Y Min', ['class' => 'col-md-2 control-label-kiri']) !!}
                            <div class="col-md-8">
                                {!! Form::text('y_min', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('x_max', 'X Max', ['class' => 'col-md-2 control-label-kiri']) !!}
                            <div class="col-md-8">
                                {!! Form::text('x_max', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('y_max', 'Y Max', ['class' => 'col-md-2 control-label-kiri']) !!}
                            <div class="col-md-8">
                                {!! Form::text('y_max', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('wkid', 'Spatial Code', ['class' => 'col-md-2 control-label-kiri']) !!}
                            <div class="col-md-3">
                                {!! Form::text('wkid', '4326', ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        
                        
                        <div class="form-group">
                            <div class="col-md-11 col-md-offset-1">
                                <button type="reset" class="btn btn-default">Reset</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    {!! Form::close() !!}

                    
                    
            </div>
        </div>
    </div>
</div>
@stop