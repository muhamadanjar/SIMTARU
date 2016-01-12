@extends('app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading"></div>
    <div class="panel-body">             
        <div class="row">
            <div class="col-md-2"><a href="user-new-user"><button class="btn btn-sm btn-primary">Tambah</button></a></div>
        </div>
        <div class="row">
            <div class="col-md-2">&nbsp;</div>
        </div>
		<div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-hover" id="datatable2">
                    <thead>
                        <tr>
                            <th >#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Level User</th>
              
                        </tr>
                    </thead>
                    <tbody>
                   
                        @foreach ($users as $key => $value)
                        <tr>
                            <td>

                                <div style="margin-bottom: 5px;" class="btn-group">
                                    <button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">
                                    <i class="fa fa-cog"></i>
                                    <span class="caret"></span>
                                    </button>
                                    <ul role="menu" class="dropdown-menu">
                                        <li><a href="user/edit/{!! $value->id !!}"><i class="fa fa-pencil-square-o"></i> Edit</a></li>
                                        <li><a href="user/delete/{!! $value->id !!}"><i class="fa fa-trash-o"></i> Hapus</a></li>
                                        <li class="divider"></li>
                                      
                                    </ul>
                                </div>
                                

                            </td>
                            <td> {{ $value->username }}</td>
                            <td>{{ $value->email }}</td>
                            <td>{{ $value->leveluser }}</td>
                          
                        </tr>
                        @endforeach              
                    </tbody>                  
                </table>
            </div>
        </div>
    </div>
</div>

@stop