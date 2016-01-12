
<link rel="stylesheet" href="css/capture.css" type="text/css" media="all">

  <div id="camera" class="camera">
    <video id="video">Video stream not available.</video>
    <button id="startbutton">Take photo</button> 
  </div>
  <canvas id="canvas"></canvas>
  <input type="hidden" id="sourceImg">
  <input name="_token" type="hidden" value="{{ csrf_token() }}">

	
  
  <div class="output">
    <img id="photo" alt="The screen capture will appear in this box."> 
  </div>

  <!--<script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>-->
  <script>
  if(!window.jQuery){
     var script = document.createElement('script');
     script.type = "text/javascript";
     script.src = "vendor/jquery/jquery.min.js";
     document.getElementsByTagName('head')[0].appendChild(script);
  }
  </script>
  <script src="js/capture.js"></script>

