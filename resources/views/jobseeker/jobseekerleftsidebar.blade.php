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
      <span class="logo-lg"><b></b>Administrator</span>
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
            <img src="../../dist/images/edu2.jpg" class="user-image" alt="User Image"> 
            <span class="hidden-xs">Jobseeker</span>
          </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
              <img src="../../dist/images/edu2.jpg" class="img-circle" alt="User Image">
              
            </li>
             
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{url('jobseeker/jobseeker_profile')}}" class="btn btn-default btn-flat">Profile</a>
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
          <a href="{{url('jobseeker_dashboard')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
       
        <!-- <li class="treeview">
            <a href="{{url('jobseeker/post_resume')}}"><i class="fa fa-edit"></i> Resume Post
          </a>
           
        </li> -->
          <li class="treeview" <?php echo($lasturl == 'viewdetail')?'class="active"':'';?>>
            <a href="{{url('jobseeker/viewdetail')}}"><i class="fa fa-info" aria-hidden="true"></i> Profile</a>
          </li>

       </ul>

<!-- gdfgdfgdgd -->
       <!-- <ul class="treeview-menu">
            <li><a href="{{url('jobseeker/post_resume')}}"><i class="fa fa-circle-o"></i> Resume Post</a></li>
            
            <li <?php echo($lasturl == 'allresume_list')?'class="active"':'';?>>
            <a href="{{url('jobseeker/allresume_list')}}"><i class="fa fa-circle-o"></i> All Resume Post</a>
            </li>
            <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
            <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li> 
          </ul>   -->
<!-- fgsdgdgdgd -->
    </section>
    <!-- /.sidebar -->
  </aside>
