<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <title>Sistem Pemantauan Tata Ruang Kabupaten Bogor</title>
        <link rel="icon" href="images/kabbogor.png" />
       	{!! Html::style('//js.arcgis.com/3.11compact/esri/css/esri.css') !!}
        {!! Html::style('//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css') !!}
        {!! Html::style('css/theme/dbootstrap/dbootstrap.css') !!}
        {!! Html::style('css/main.css') !!}
    </head>
    <body class="dbootstrap">
        <div class="appHeader">
            <div class="headerLogo">
                <img alt="logo" src="images/rocket-logo.png" height="54" />
            </div>
            <div class="headerTitle">
                <span id="headerTitleSpan">
                    SI ~ MANTAU
                </span>
                <div id="subHeaderTitleSpan" class="subHeaderTitle">
                    Sistem Pemantauan Tata Ruang Kabupaten Bogor
                </div>
            </div>
            <div class="search">
                <div id='geocodeDijit'>
                </div>
            </div>
            <div class="headerLinks">
                <div id="helpDijit">
                </div>
            </div>
        </div>
        <script type="text/javascript">
            var dojoConfig = {
                async: true,
                packages: [{
                    name: 'viewer',
                    location: location.pathname.replace(/[^\/]+$/, '') + 'js/viewer'
                },{
                    name: 'config',
                    location: location.pathname.replace(/[^\/]+$/, '') + 'js/config'
                },{
                    name: 'gis',
                    location: location.pathname.replace(/[^\/]+$/, '') + 'js/gis'
                }]
            };
        </script>
        <!--[if lt IE 9]>
            <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/es5-shim/4.0.3/es5-shim.min.js"></script>
        <![endif]-->
        {!! HTML::script('//js.arcgis.com/3.11compact/'); !!}
        <script type="text/javascript">
            // get the config file from the url if present
            var file = 'config/viewer', s = window.location.search, q = s.match(/config=([^&]*)/i);
            if (q && q.length > 0) {
                file = q[1];
                if(file.indexOf('/') < 0) {
                    file = 'config/' + file;
                }
            }
            require(['viewer/Controller', file], function(Controller, config){
                Controller.startup(config);
            });
        </script>
      	


        
    </body>
</html>
