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
                            All fields must be filled and an image must be included.
                        </div>
                    @else
                        <div class="alert alert-dismissible alert-info">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            You can create a new user here.
                        </div>
                    @endif
                    {!! Form::open(['class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            {!! Form::label('name', 'Nama Lengkap', ['class' => 'col-md-1 control-label']) !!}
                            <div class="col-md-11">
                                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => "Nama Lengkap"]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-1 control-label">Email</label>
                            <div class="col-md-11">
                                 {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => "Email"]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-md-1 control-label">Username</label>
                            <div class="col-md-11">
                                 {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => "Username"]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="leveluser" class="col-md-1 control-label">Level User</label>
                            <div class="col-md-11">
                                 {!! Form::checkbox('leveluser[]', '1', ['class' => 'form-control', 'placeholder' => "Your post's title here"]) !!} Admin
                                 {!! Form::checkbox('leveluser[]', '2', ['class' => 'form-control', 'placeholder' => "Your post's title here"]) !!} User
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-1 control-label">Password</label>
                            <div class="col-md-11">
                                 <input type="password" name="password" class="form-control" placeholder="Password" />
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