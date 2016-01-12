@extends('app')

@section('content')


<div class="panel panel-default">
    <div class="panel-heading">Layer Role</div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                      	<th>#</th>
                        <th>Nama Layer</th>
                        <th>Superuser</th>
                        <th>User</th>
                        <th>non User</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($layers as $key => $value)
                        <tr>
                            <td>{{ $key }}</td>
                            <td>{{ $value->layername }}{{ $value->id_layer }}</td>
                          	<td><input type="checkbox" name="superuser[]" value="1" /></td>
                            <td><input type="checkbox" name="user[]" value="2" /></td>
                            <td><input type="checkbox" name="nuser[]" value="0" /></td>
                        </tr>
                    @endforeach 
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop