@extends('app')
@section('content')
<script src="{{ asset('3.12compact/init.js') }}"></script>
<!--<script type="text/javascript">
    require(["dojo/dom","esri/request","dojo/domReady!" ], function(dom,esriRequest) {
    var html='';
    var name,id;
    var layersRequest = esriRequest({
        url: dom.byId('layerurl').value,
        content: { f: "json" },
        handleAs: "json",
        callbackParamName: "callback"
    });
    layersRequest.then(
      function(response) {
        console.log(response);
        if(!response.hasOwnProperty('fields')){
            for (var prop in response.layers) {
                if (response.layers.hasOwnProperty(prop)) {
                    name = response.layers[prop].name;
                    id = response.layers[prop].id;
                    url = "{{ URL::to('layerinfoftr') }}/{{ $layers->id_layer }}-"+id+"-{{ $layers->layer }}";
                    html += '<li class="list-group-item">' + name + '<a href="'+url+'"><i class="fa fa-pencil-square-o"></i></a></li>';
                }
            }
        }else{
                name = response.name;
                id = response.id;
                url = "{{ URL::to('layerinfoftr') }}/{{ $layers->id_layer }}-"+id+"-{{ $layers->layer }}";
                html += '<li class="list-group-item">' + name + '<a href="'+url+'"><i class="fa fa-pencil-square-o"></i></a></li>';
            
        }
        dom.byId("list-group").innerHTML = html;
    }, function(error) {
        console.log("Error: ", error.message);
    });
    
  });
</script>-->

<div class="panel panel-default">
  <div class="panel-heading">{{ $title }}</div>
  <div class="panel-body"> 
      <div class="row">
      <div class="col-sm-12">
      <form>
        <div class="form-group">
          <label for="layerurl">URL</label>
          <input type="text" class="form-control" id="layerurl" value="{{ $layers->layerurl }}" placeholder="Layer URL">
          <input type="text" class="form-control" id="layer" value="{{ $layers->layer }}" placeholder="Layer">
        </div>
        <div id="content"></div>
        <div class="form-group">
            <ul id="list-group" class="list-group">
              
            </ul>
            <ul class="list-group">
             
              @if(count($field) > 0)
             
              @foreach($field as $key => $d)
                <li class="list-group-item">{{ $d->name }} <a class="btn btn-primary btn-xs" href="{{ URL::to('layerinfoftr') }}/{{ $layers->id_layer }}-{{ $d->id }}-{{ $layers->layer }}"><i class="fa fa-pencil-square-o"></i></a></li>
              @endforeach
              @else
                <div class="row">
                  <div class="col-sm-12">
                    <div class="alert alert-dismissible alert-danger">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                          Tolong Update Layer Untuk Mendapatkan Info.<br>
                          Untuk Update Silakan Link berikut.
                          <a href="{{ URL::to('layer/edit/') }}/{{ $id }}" class="alert-link">Link</a>
                    </div>
                  </div>
                </div>
                
              @endif
            </ul>
        </div>
      </form>
      </div>
      </div>
  </div>
</div>
@stop