@extends('app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading"></div>
    <div class="panel-body">             
        <div class="row">
            <div class="col-md-2"><a href="bookmark-new-bookmark"><button class="btn btn-sm btn-primary">Tambah</button></a></div>
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
                            <th>Bookmark</th>
                            <th>WKID</th>
                           
                           
                        </tr>
                    </thead>
                    <tbody>
                      
                        @foreach ($bookmarks as $key => $value)
                        <tr>
                            <td>
                                <div class="btn-group">
                                    <button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">
                                    <i class="fa fa-cog"></i>
                                    <span class="caret"></span>
                                    </button>
                                    <ul role="menu" class="dropdown-menu">
                                        <li><a href="bookmark/edit/{!! $value->id !!}"><i class="fa fa-pencil-square-o"></i> Edit</a></li>
                                        <li><a href="bookmark/delete/{!! $value->id !!}"><i class="fa fa-trash-o"></i> Hapus</a></li>
                                        <li class="divider"></li>
                                      
                                    </ul>
                                </div>
                            </td>
                            <td> {{ $value->name }}</td>
                            <td>{{ $value->wkid }}</td>
                          
            
                        </tr>
                        @endforeach              
                    </tbody>                  
                </table>
            </div>
        </div>
    </div>
</div>
@stop