@extends('app')
@section('content')



<!--<script type="text/javascript">
    require(["dojo/dom", "dojo/on", "dojo/dom-class", "dojo/_base/json", "dojo/_base/array", "dojo/string", "esri/request", "dojo/domReady!"], 
      function(dom, on, domClass, dojoJson, array, dojoString, esriRequest) {
        var url = dom.byId('layerurl').value;
        var store_data;
        var arr_store = [];
      
 
        if(url.length === 0){
            alert("Please enter a URL");
            return;
        }

        function isObjectEmpty(object){
          var isEmpty = true;
          for(keys in object){
             isEmpty = false;
             break; // exiting since we found that the object is not empty
          }
          return isEmpty;
        }

        var form_check = function (response) {
            for (var prop in response.fields) {
                var fields = response.fields[prop];
                check = document.createElement('input');
                check.setAttribute("type", "checkbox");
                check.setAttribute("name", "visible[]");
                check.setAttribute("class",'checkbox1')
                check.value = 'true.'+prop+'.'+fields.name;
            }
        }

        var showtable_check = function (response) {
          var alert = '';
            if (response.hasOwnProperty("fields")) {
                if (response.fields === null) {
                    console.log('Field tidak ada');
                    tr = document.createElement('tr');
                    td = document.createElement('td');
                    tr.appendChild(td);
                    td.textContent = 'Field tidak ada';
                    td.colSpan = 3;
                    createtabletbody.appendChild(tr);
                    createtable.appendChild(createtabletbody);

                };

                form_check(response);
            }
        }

        var requestFailed = function(error, io){
            dojoJson.toJsonIndentStr = " ";
            console.log(dojoJson.toJson(error, true));
        }
        var requestSucceeded = function(response, io){
            var fieldInfo, pad;
            pad = dojoString.pad;

            dojoJson.toJsonIndentStr = "  ";
            //console.log(response);

            if (response.hasOwnProperty("fields")) {
              console.log("got some fields");

              if (response.fields === null) {
                  console.log('Field tidak ada');
                  tr = document.createElement('tr');
                  td = document.createElement('td');
                  tr.appendChild(td);
                  td.textContent = 'Field tidak ada';
                  td.colSpan = 3;
                  createtabletbody.appendChild(tr);
                  createtable.appendChild(createtabletbody);

              };
              
              for (var prop in response.fields) {
                  var fields = response.fields[prop];
                  //console.log(fields.name);
                  check = document.createElement('input');
                  check.setAttribute("type", "checkbox");
                  check.setAttribute("name", "visible[]");
                  check.setAttribute("class",'checkbox1')
                  check.value = 'true.'+prop+'.'+fields.name;
                  arr_store.push(fields.name);
                  
                  

                  nf = document.createElement('input');
                  nf.setAttribute("type", "hidden");
                  nf.setAttribute("class", "nf");
                  nf.setAttribute("name", "nf[]");
                  nf.value = fields.alias;
                  nalias = document.createElement('input');
                  nalias.setAttribute("type", "hidden");
                  nalias.setAttribute("class", "nalias");
                  nalias.setAttribute("name", "nalias[]");
                  nalias.value = fields.alias;
                  tbody = document.createElement('tbody');
                  tr = document.createElement('tr');
                  td = document.createElement('td');
                  td2 = document.createElement('td');
                  td3 = document.createElement('td');
                  tr.appendChild(td);tr.appendChild(td2);tr.appendChild(td3);
                  td.appendChild(check);td.appendChild(nf);td2.textContent = fields.name;td.appendChild(nalias);td3.textContent = fields.alias;
                  tbody.appendChild(tr);
                  createtable.appendChild(tbody);

              }
      
              $(checkall).click(function(event) {  //on click
                  if(this.checked) { // check select status
                    $('.'+check.className).each(function() { //loop through each checkbox
                          this.checked = true;  //select all checkboxes with class "checkbox1"              
                    });
                  }else{
                    $('.'+check.className).each(function() { //loop through each checkbox
                          this.checked = false; //deselect all checkboxes with class "checkbox1"                      
                    });        
                  }
              });

            }else{
            
                console.log('Field tidak ada');
            }
        }

        var x = document.getElementById("dif");
        var createtable = document.createElement('table');
        createtable.setAttribute("class", "table table-bordered");
        
        createtabletbody = document.createElement('tbody');
        createtabletr = document.createElement('tr');
        createtableth = document.createElement('th');
        createtableth2 = document.createElement('th');
        createtableth3 = document.createElement('th');
        createtableth.textContent = '';
        checkall = document.createElement('input');
        checkall.setAttribute('type','checkbox');
        checkall.setAttribute('id','selecctall');
        createtableth.appendChild(checkall);
        createtableth2.textContent = 'Nama';
        createtableth3.textContent = 'Label';
        createtabletr.appendChild(createtableth);
        createtabletr.appendChild(createtableth2);
        createtabletr.appendChild(createtableth3);
        createtabletbody.appendChild(createtabletr);

        createtable.appendChild(createtabletbody);
        x.appendChild(createtable);

        var requestHandle = esriRequest({
            "url": url,
            "content": {
              "f": "json"
            },
            "callbackParamName": "callback"
        });

        
        requestHandle.then(requestSucceeded, requestFailed);
    });
</script>-->

<?php
$title_m = '';$caption_m = '';$url_m = '';$link_m ='';
$check;
if(!empty($identify)){
  $title = $identify->title;
  $description = $identify->description;
  $key_ = json_decode($identify->key_,true);
  $media = json_decode($identify->media,true);
 
  $lengthkey_ = count($key_);
  $lengthmedia = count($media);
  
  $encode_key = json_decode(json_encode($key_));
  //print_r($key_);
 
}
//print_r($key_);
$url_service = ($layers->tipelayer == 'dynamic' ? $layers->layerurl.'/'.$idx : $layers->layerurl);
?>
<div class="panel panel-default">
  <div class="panel-heading">{{ $title }}</div>
  <div class="panel-body"> 
      <div class="row">
      <div class="col-sm-12">
      <form method="post" enctype="multipart/form-data" role="form" accept-charset="UTF-8">
        <input name="_token" type="hidden" value="{{ csrf_token() }}">
        <div class="form-group">
          <label for="layerurl">Judul</label>
          <input type="hidden" class="form-control" disabled="disabled" id="layerurl" value="{{ $url_service }}" />
          <input type="text" name="title" value="{{ $title }}" class="form-control" />
          <input type="hidden" name="layerid" class="form-control" value="{{ $idx }}" />
          <input type="hidden" name="layername" class="form-control" value="{{ $layers->layer }}" />
        </div>
        <div class="form-group">
            <label for="display">Display</label>
            <select name="display" class="form-control" id="display-keyvalue">
              @if($identify->display == 'keyvalue')
              <option value="-">---</option>
              <option value="keyvalue" selected>Key Value</option>
              <option value="custom">Custom</option>
              @elseif($identify->display == 'custom')
              <option value="-">---</option>
              <option value="keyvalue">Key Value</option>
              <option value="custom" selected>Custom</option>
              @else
              <option value="keyvalue">Key Value</option>
              <option value="custom">Custom</option>
              @endif
            </select>
        </div>
        <div class="form-group" id="deskripsi">
            <label for="description">Deskripsi</label>
            
            <textarea id="description" name="description" class="form-control">{{ $description }}</textarea>
        </div>
        <div class="form-group" id="field-list">
            <label for="title">Field</label>
            <div id="dif">
                
            </div>

            <table class="table table-bordered">
              <tr>
                <th><input type="checkbox" name="checkall" id="checkall" /></th>
                <th>Nama</th>
                <th>Alias</th>
              </tr>
              @if($lengthkey_ > 0)
                  {{--*/ $var ='' /*--}}
                  @foreach($field->fields as $key => $a)
                  <?php $b = ($layers->tipelayer == 'dynamic' ? $a->alias : $a->name); ?>
                    
                    @if($encode_key[$key]->fieldName == $b )
                      {{--*/ $c = $encode_key[$key]->label /*--}}
                      @if($encode_key[$key]->visible)
                          
                          {{--*/ $var = 'checked' /*--}}
                          
                      @endif

                    @endif
                  <tr>
                    <td><input {{ @$var }} type="checkbox" class="checkbox" name="visible[{{ $key }}]" value="{{ $b }}" /></td>
                    <td>{{ $a->name }}<input type="hidden" name="name_field[]" value="{{ $b }}"></td>
                    <td><input type="text" class="form-control" name="label_field[]" value="{{ $c }}"></td>
                  </tr>
                  {{--*/ unset($var) /*--}}
                  @endforeach

              @else
              @foreach($field->fields as $key => $a)
              <?php $b = ($layers->tipelayer == 'dynamic' ? $a->alias : $a->name); ?>
              
              <tr>
                <td><input type="checkbox" class="checkbox" name="visible[{{ $key }}]" value="{{ $b }}" /></td>
                <td>{{ $a->name }}<input type="hidden" name="name_field[]" value="{{ $b }}"></td>
                <td><input type="text" class="form-control" name="label_field[]" value="{{ $b }}"></td>
              </tr>
              @endforeach
              @endif


              
            </table>
        </div>
        <!-- Media -->
        @if($lengthmedia > 0)
        @foreach($media as $key => $vm)
          <?php $title_m = $vm['title'] ?>
          <?php $caption_m = $vm['caption'] ?>
          @if($vm['type'] == 'image')
          <?php $url_m = $vm['value']['sourceURL'] ?>
          <?php $link_m = $vm['value']['linkURL'] ?>
          @endif
        <div class="form-group">
          <label>Type</label>
          <select name="type_m" class="form-control" id="type_m">
            @if($vm['type'] == 'image')
            <option value="image" selected="selected">Image</option>
            <option value="barchart">Bar Chart</option>
            <option value="columnchart">Column Chart</option>
            <option value="linechart">Line Chart</option>
            <option value="piechart">Pie Chart</option>
            @elseif($vm['type'] == 'barchart')
            <option value="image">Image</option>
            <option value="barchart" selected="selected">Bar Chart</option>
            <option value="columnchart">Column Chart</option>
            <option value="linechart">Line Chart</option>
            <option value="piechart">Pie Chart</option>
            @else
            <option value="image">Image</option>
            <option value="barchart">Bar Chart</option>
            <option value="columnchart">Column Chart</option>
            <option value="linechart">Line Chart</option>
            <option value="piechart">Pie Chart</option>
            @endif
          </select>
          <input type="text" name="title_m" placeholder="Judul" class="form-control cols-sm-2" id="media" value="{{ $vm['title'] }}">
          <input type="text" name="caption_m" placeholder="Caption" class="form-control" id="media" value="{{ $caption_m }}">
          <input type="text" name="link_m" placeholder="Link URL" class="form-control" id="media" value="{{ $link_m }}">
          <input type="text" name="url_m" placeholder="Source URL" class="form-control" id="media" value="{{ $url_m }}">
        </div>
        <div class="form-group" id="media-list">
          <label for="title">Media</label>
          <div id="dim"></div>
            <table class="table table-bordered">
              <tr>
                <th><input type="checkbox" name="checkall-field" id="checkall-field" /></th>
                <th>Nama</th>
                <th>Alias</th>
              </tr>
              @foreach($field->fields as $key => $a)
              <?php $vg=$layers->tipelayer = 'dynamic' ? $a->alias : $a->name; ?>
              <tr>
                <td><input type="checkbox" class="checkbox-field" name="field[{{ $key }}]" value="{{ $vg }}" /></td>
                <td>{{ $a->name }}</td>
                <td>{{ $a->alias }}</td>
              </tr>
              @endforeach
              
            </table>
        </div>
        @endforeach
        @else
        <div class="form-group">
          <label>Type</label>
          <select name="type_m" class="form-control" id="type_m">
            <option value="image">Image</option>
            <option value="barchart">Bar Chart</option>
            <option value="columnchart">Column Chart</option>
            <option value="linechart">Line Chart</option>
            <option value="piechart">Pie Chart</option>
          </select>
          <input type="text" name="title_m" placeholder="Judul" class="form-control cols-sm-2" id="media" value="{{ $title_m }}">
          <input type="text" name="caption_m" placeholder="Caption" class="form-control" id="media" value="{{ $caption_m }}">
          <input type="text" name="link_m" placeholder="Link URL" class="form-control" id="media" value="{{ $link_m }}">
          <input type="text" name="url_m" placeholder="Source URL" class="form-control" id="media" value="{{ $url_m }}">
        </div>
        <div class="form-group" id="media-list">
          <label for="title">Media</label>
          <div id="dim"></div>
            <table class="table table-bordered">
              <tr>
                <th><input type="checkbox" name="checkall-field" id="checkall-field" /></th>
                <th>Nama</th>
                <th>Alias</th>
              </tr>
              @foreach($field->fields as $key => $a)
              <?php $vg=$layers->tipelayer = 'dynamic' ? $a->alias : $a->name; ?>
              <tr>
                <td><input type="checkbox" class="checkbox-field" name="field[{{ $key }}]" value="{{ $vg }}" /></td>
                <td>{{ $a->name }}</td>
                <td>{{ $a->alias }}</td>
              </tr>
              @endforeach
            </table>
        </div>
        @endif

        

        <div class="form-group">
            <label for="showattachments">Show Attachments</label>
            @if($identify->showattachments == true)
            <input type="radio" name="showattachments" value="true" checked="checked"> Yes
            <input type="radio" name="showattachments" value="false"> No
            @elseif($identify->showattachments == false)
            <input type="radio" name="showattachments" value="true"> Yes
            <input type="radio" name="showattachments" value="false" checked="checked"> No
            @else
            <input type="radio" name="showattachments" value="true"> Yes
            <input type="radio" name="showattachments" value="false"> No
            @endif
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary btn-sm" name="button" value="Submit">  
        </div>
      </form>
      </div>
      </div>
     
      
  </div>
</div>
@stop