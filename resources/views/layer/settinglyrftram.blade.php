                    <meta name="_token" content="{!! csrf_token() !!}"/>
                    <link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/bootstrap/css/bootstrap.min.css') }}">
                    {!! Form::open(['id' =>'layerinfo-sm','url' =>'layerinfosm', 'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data']) !!}
                       
                        <div class="form-group">
                            <label for="type" class="col-md-2 control-label">Tipe Layer</label>
                            <div class="col-md-10">
                                 <select name="type" class="form-control" id="type">
                                    <option value="image">Image</option>
                                    <option value="chart">Bar Chart</option>
                                    <option value="column">Column Chart</option>
                                    <option value="line">Line Chart</option>
                                    <option value="pie">Pie Chart</option>

                                 </select>
                            </div>
                        </div>
                        <div class="form-group">
                            
                            {!! Form::label('title', 'Title', ['class' => 'col-md-2 control-label']) !!}    
                           
                            <div class="col-md-10">
                                {!! Form::text('title', null, ['class' => 'form-control', 'id' => "title"]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                           
                                <label for="caption" class="col-md-2 control-label">Caption</label>    
                            
                            <div class="col-md-10">
                                 {!! Form::text('caption', null, ['class' => 'form-control', 'id' => "caption"]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                         
                                <label for="url" class="col-md-2 control-label">URL</label>
                         
                            <div class="col-md-10">
                                 {!! Form::text('url', null, ['class' => 'form-control', 'id' => "url"]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                       
                                <label for="link" class="col-md-2 control-label">Link</label>
                          
                            <div class="col-md-10">
                                 {!! Form::text('link', null, ['class' => 'form-control', 'id' => "link"]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-11 col-md-offset-1">
                                <button type="button" id="btn_s" class="send-btn btn btn-primary">Submit</button>
                            </div>
                        </div>
                        <script type="text/javascript" src="{{ URL::asset('vendor/jquery/jquery.min.js') }}"></script>
                        <script type="text/javascript" src="{{ URL::asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
                        <script type="text/javascript" src="{{ URL::asset('js/script.js') }}"></script>

                        <script type="text/javascript">
                            $.ajaxSetup({
                                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
                            });
                        </script>

                        {!! Form::close() !!}
    

