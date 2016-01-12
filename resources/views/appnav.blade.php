<!-- START aside-->
<aside class="aside">
<!-- START Sidebar (left)-->
         <nav class="sidebar">
            <ul class="nav">
               <!-- START user info-->
               <li>
                  <div data-toggle="collapse-next" class="item user-block has-submenu">
                     <!-- User picture-->
                     <div class="user-block-picture">
                        <img src="{{ URL::to('images/kabbogor.png') }}" alt="Avatar" width="60" class="img-thumbnail img-circle">
                        <!-- Status when collapsed-->
                        <div class="user-block-status">
                           <div class="point point-success point-lg"></div>
                        </div>
                     </div>
                     <!-- Name and Role-->
                     <div class="user-block-info">
                        <span class="user-block-name item-text">Selamat Datang, <br></span>
                        <span class="user-block-role">{{ \Auth::user()->name }}</span>
                       
                     </div>
                  </div>
                  <!-- START User links collapse-->
                  <ul class="nav collapse">
                    
                     <li class="divider"></li>
                     <li><a href="{{ action('CustomAuthController@getLogout') }}">Keluar</a></li>
                  </ul>
                  <!-- END User links collapse-->
               </li>
               <!-- END user info-->
               <!-- START Menu-->
               <li>
                  <a href="{{ action('PagesController@dashboard') }}" title="Dashboard" class="no-submenu">
                     <em class="fa fa-dashboard"></em>
                     <!--<div class="label label-primary pull-right">12</div>-->
                     <span class="item-text">Dashboard</span>
                  </a>
               </li>

               <li>
                  <a href="{{ action('GeoTagCtrl@index') }}" title="Dashboard" class="no-submenu">
                     <em class="fa fa-dashboard"></em>
                     <!--<div class="label label-primary pull-right">12</div>-->
                     <span class="item-text">GeoTag</span>
                  </a>
               </li>
               
               <li>
                  <a href="#" title="Pengaturan Web" data-toggle="collapse-next" class="has-submenu">
                     <em class="fa fa-cogs"></em>
                     <span class="item-text">Pengaturan Web</span>
                  </a>
                  <!-- START SubMenu item-->
                  <ul class="nav collapse ">
                   
                     <li>
                        <a href="{{ action('MapController@vieweruser') }}" title="Map" data-toggle="" class="no-submenu">
                           <span class="item-text">Map</span>
                        </a>
                     </li>
                     <li>
                        <a href="{{ action('BookmarkController@viewAllBookmark') }}" title="Bookmark" data-toggle="" class="no-submenu">
                           <span class="item-text">Bookmark</span>
                        </a>
                     </li>
                     <li>
                        <a href="{{ action('LayerController@viewAllLayer') }}" title="Layer" class="no-submenu">
                           <span class="item-text">Layer</span>
                        </a>
                     </li>
                     <li>
                        <a href="{{ action('SettingWeb@SettingWebURLForm') }}" title="Layer" class="no-submenu">
                           <span class="item-text">Setting URL Layer</span>
                        </a>
                     </li>
                     
                  </ul>
                  <!-- END SubMenu item-->
               </li>
			      <li>
                  <a href="#" title="User" data-toggle="collapse-next" class="has-submenu">
                     <em class="fa fa-user"></em>
                     <span class="item-text">User</span>
                  </a>
                  <!-- START SubMenu item-->
                  <ul class="nav collapse ">
                     <li>
                        <a href="user" title="List User" data-toggle="" class="no-submenu">
                           <span class="item-text">List</span>
                        </a>
                     </li>

                  </ul>
                  <!-- END SubMenu item-->
               </li>
               <!-- END Menu-->
               <!-- Sidebar footer    -->
               <li class="nav-footer">
                  <div class="nav-footer-divider"></div>
                  <!-- START button group-->
                  <div class="btn-group text-center">
                     <a href="#"><button type="button" data-toggle="tooltip" data-title="Settings" class="btn btn-link">
                        <em class="fa fa-cog text-muted"></em>
                     </button></a>
                     <a href="{{ action('CustomAuthController@getLogout') }}"><button type="button" data-toggle="tooltip" data-title="Logout" class="btn btn-link">
                        <em class="fa fa-sign-out text-muted"></em>
                     </button> </a>
                  </div>
                  <!-- END button group-->
               </li>
            </ul>
         </nav>
<!-- END Sidebar (left)-->
</aside>
<!-- End aside-->