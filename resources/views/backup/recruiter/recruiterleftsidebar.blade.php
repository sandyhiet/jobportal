 <?php
$req_uri = $_SERVER['REQUEST_URI'];
$req_uri_arr = explode('/', $req_uri);
$lasturl = $req_uri_arr[sizeof($req_uri_arr)-1];
$secondlasturl = $req_uri_arr[sizeof($req_uri_arr)-2];
?>
<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b></b>Recruiter</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
         <!--  <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success"></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
              
                <ul class="menu">
                  <li>
                    <a href="#">
                      <div class="pull-left">
                          <img src="../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                 
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li> -->
          <!-- User Account: style can be found in dropdown.less -->

    

          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="../dist/images/edu2.jpg" class="user-image" alt="User Image"> 
            <span class="hidden-xs">Recruiter Profile</span>
          </a>
            <ul class="dropdown-menu">
              <!-- User image --> 
              <li class="user-header">
               
              <img src="../dist/images/edu2.jpg" class="img-circle" alt="User Image">
              
            </li>
            
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{url('recruiter/recruiter_profile')}}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{url('/')}}" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
     
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="{{url('recruiter_dashboard')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Jobs</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('recruiter/post_job')}}"><i class="fa fa-circle-o"></i> Job Post</a></li>            
            <li <?php echo($lasturl == 'allpost')?'class="active"':'';?>>
            <a href="{{url('recruiter/allpost')}}"><i class="fa fa-circle-o"></i> All job Post</a>
            </li>
           <!--  <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
            <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li> -->
          </ul>
        </li>
        <li class="treeview">
         <li><a href="{{url('recruiter/package')}}"><i class="fa fa-circle-o"></i> Choose Plan</a></li>
        </li>

       </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
