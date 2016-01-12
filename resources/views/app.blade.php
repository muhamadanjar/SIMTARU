<?php
date_default_timezone_set('Asia/Jakarta');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<meta name="_token" content="{!! csrf_token() !!}"/>
	<title>Tata Ruang Kabupaten Bogor</title>
    <link rel="icon" href="{{asset('images/kabbogor.png')}}" />
	<!-- Bootstrap CSS-->
  {!! Html::style('vendor/bootstrap/css/bootstrap.min.css') !!}
  <!-- Vendor CSS-->
  {!! Html::style('vendor/fontawesome/css/font-awesome.min.css') !!}
  {!! Html::style('vendor/animo/animate+animo.css') !!}
  {!! Html::style('vendor/csspinner/csspinner.min.css') !!}
  {!! Html::style('vendor/chosen/chosen.min.css') !!}

	{!! Html::style('vendor/datatable/media/css/jquery.dataTables.min.css') !!}
	{!! Html::style('/css/app_cms.css') !!}

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

  <!-- Modernizr JS Script-->
  {!! HTML::script('vendor/modernizr/modernizr.js'); !!}
  <!-- FastClick for mobiles-->
  {!! HTML::script('vendor/fastclick/fastclick.js'); !!}

	
</head>
<body>
	
	<!-- START Main wrapper-->
   <section class="wrapper">
      <!-- START Top Navbar-->
      <nav role="navigation" class="navbar navbar-default navbar-top navbar-fixed-top">
         <!-- START navbar header-->
         <div class="navbar-header">
            <a href="#" class="navbar-brand">
               <div class="brand-logo">WEBGIS</div>
               <div class="brand-logo-collapsed">WR</div>
            </a>
         </div>
         <!-- END navbar header-->
         <!-- START Nav wrapper-->
         <div class="nav-wrapper">
            <ul class="nav navbar-nav">
                <li><a data-toggle="aside" href="javascript:void(0);"><em class="fa fa-align-left"></em></a></li>
            </ul>
         </div>
         <!-- END Nav wrapper-->
         <!-- START Search form-->
         <form role="search" id="searchForm" class="navbar-form" method="post" >
            <div class="form-group has-feedback">
               <input type="text" id="search" name="search" placeholder="Type and hit Enter.." class="form-control">
               <div data-toggle="navbar-search-dismiss" class="fa fa-times form-control-feedback"></div>
            </div>
            <button type="submit" name="sbtn" class="hidden btn btn-default">Submit</button>
         </form>
         
         <!-- END Search form-->
      </nav>
      <!-- END Top Navbar-->
      <!-- START aside-->
        @if(Auth::user())
			   @include('appnav')
        @endif

   		
   		@include('helper/delete_confirm')
      <!-- End aside-->
      <!-- START aside-->
    
      <!-- END aside-->
      <!-- START Main section-->
      <section>
         <!-- START Page content-->
         <section class="main-content">
            @if(Auth::user())
            <h3>
               <br>
               <small>Administrator</small>
            </h3>
            @endif
            @if(Session::has('message'))
                  {!! Session::get('message') !!}
            @endif
            <div class="row">
            <div class="col-lg-12">

            @yield('content')
            </div>
            </div>
   

             
         </section>
         <!-- END Page content-->
      </section>
      <!-- END Main section-->
   </section>


	<!-- Scripts -->
	<!-- Main vendor Scripts-->
    {!! HTML::script('vendor/jquery/jquery.min.js'); !!}
    {!! HTML::script('vendor/bootstrap/js/bootstrap.min.js'); !!}

    <!-- Plugins-->
    {!! HTML::script('vendor/chosen/chosen.jquery.min.js'); !!}
    {!! HTML::script('vendor/slider/js/bootstrap-slider.js'); !!}
    {!! HTML::script('vendor/filestyle/bootstrap-filestyle.min.js'); !!}
    <!-- Animo-->
    {!! HTML::script('vendor/animo/animo.min.js'); !!}
    <!-- Sparklines-->
    {!! HTML::script('vendor/sparklines/jquery.sparkline.min.js'); !!}
    <!-- Slimscroll-->
    {!! HTML::script('vendor/slimscroll/jquery.slimscroll.min.js'); !!}

    
    
	{!! HTML::script('vendor/datatable/media/js/jquery.dataTables.js'); !!}
	{!! HTML::script('js/admin.js'); !!}
</body>
</html>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
        <div id="form-dialog"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>