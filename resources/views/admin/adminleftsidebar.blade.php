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
            <img src="../dist/images/edu2.jpg" class="user-image" alt="User Image"> 
            <span class="hidden-xs">Admin</span>
          </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
              <img src="../dist/images/edu2.jpg" class="img-circle" alt="User Image">
              
            </li>
             
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{url('admin_profile')}}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{url('logout')}}" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../dist/images/edu2.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Administrator</p>
        </div>
      </div>
      <!-- search form -->
     <!--  <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="{{url('admin/dashboard')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
         <li class="treeview <?php echo($lasturl ==  'editSliderImage' || $secondlasturl == 'homepage_banner' || $secondlasturl == 'alltestimonials' || $lasturl == 'social_links' || $lasturl == 'work' || $lasturl == 'logo')?'active':'';?>">
     <!-- HOME PAGES START*********** -->

      <a href="{{url('dashboard')}}">
        <i class="fa fa-home"></i> <span>Homepage</span><i class="fa fa-angle-left pull-right"></i>
      </a>

        <ul class="treeview-menu">

           <li <?php echo($secondlasturl == 'editSliderImage' || $lasturl == 'homepage_banner')?'class="active"':'';?>>
              <a href="{{url('admin/homepage_banner')}}"><i class="fa fa-circle-o"></i> Banner</a>
            </li> 

           <li <?php echo($lasturl == 'alltestimonials')?'class="active"':'';?>>
            <a href="{{url('admin/alltestimonials')}}"><i class="fa fa-circle-o"></i> Testimonials</a>
          </li> 

          <li <?php echo($lasturl == 'social_links')?'class="active"':'';?>>
            <a href="{{url('admin/social_links')}}"><i class="fa fa-circle-o"></i>Social Links</a>
          </li>
         
          <li <?php echo($lasturl == 'work')?'class="active"':'';?>>
            <a href="{{url('admin/work')}}"><i class="fa fa-circle-o"></i> Work</a>
          </li> 

          <li <?php echo($lasturl =='logo')?'class="active"':'';?>>
            <a href="{{url('admin/logo')}}"><i class="fa fa-circle-o"></i>Logo
            </a>
          </li>
        
        </ul>
      </li>


 <!-- News Start -->


     <li class="treeview">
          <a href="#">
            <i class="fa fa-home" aria-hidden="true"></i>
            <span>News</span> <i class="fa fa-angle-left pull-right"></i>
            <span class="label label-primary pull-right"></span>
          </a>
          <ul class="treeview-menu">
            <li <?php echo($secondlasturl == 'allnews' || $lasturl == 'homepage_banner')?'class="active"':'';?>>
            <a href="{{url('admin/allnews')}}"><i class="fa fa-circle-o"></i> All News</a>
          </li> 
          </ul>
      </li>

      <!-- Start job center  -->

      <li class="treeview <?php echo($secondlasturl == 'edit_Category' || $lasturl == 'all_recruiter_profile' || $lasturl == 'all_recruiterjobpost'  || $lasturl == 'all_recruiterApprovedjob' || $lasturl == 'all_recruiterRejectedjob' || $lasturl == 'add_keyskills' || $lasturl == 'all_role_category' || $lasturl == 'add_role_category')?'active':'';?>">
        <a href="#">
          <i class="fa fa-files-o"></i>
          <span>Job Center</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">

          <li <?php echo($lasturl == 'all_recruiter_profile')?'class="active"':'';?>>
                <a href="{{url('admin/all_recruiter_profile')}}">
                  <i class="fa fa-angle-double-right"></i> Recruiter Profile
                </a>
          </li>
          
          
          <li <?php echo($lasturl == 'all_recruiterjobpost' || $lasturl == 'all_recruiterApprovedjob' || $lasturl == 'all_recruiterRejectedjob' || $secondlasturl == 'edit_Category')?'class="active"':'';?>>
            <a href="#">
              <i class="fa fa-circle-o"></i>Recruiter Job Post<i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li <?php echo($lasturl == 'all_recruiterjobpost')?'class="active"':'';?>>
                <a href="{{url('admin/all_recruiterjobpost')}}">
                  <i class="fa fa-angle-double-right"></i> All Job Post
                </a>
              </li>
              <li <?php echo($lasturl == 'all_recruiterApprovedjob')?'class="active"':'';?>>
                <a href="{{url('admin/all_recruiterApprovedjob')}}">
                  <i class="fa fa-angle-double-right"></i> All Approved Job
                </a>
              </li>
               <li <?php echo($lasturl == 'all_recruiterRejectedjob')?'class="active"':'';?>>
                <a href="{{url('admin/all_recruiterRejectedjob')}}">
                  <i class="fa fa-angle-double-right"></i> All Rejected Job
                </a>
              </li>
            </ul> 
          </li>



         <!--  <li <?php echo($lasturl == 'all_keyskills' || $lasturl == 'add_keyskills' || $secondlasturl == 'edit_Category')?'class="active"':'';?>>
            <a href="#">
              <i class="fa fa-circle-o"></i>Key<i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li <?php echo($lasturl == 'all_keyskills')?'class="active"':'';?>>
                <a href="{{url('admin/all_keyskills')}}">
                  <i class="fa fa-angle-double-right"></i> All Keyskills
                </a>
              </li>
              <li <?php echo($lasturl == 'add_keyskills')?'class="active"':'';?>>
                <a href="{{url('admin/add_keyskills')}}">
                  <i class="fa fa-angle-double-right"></i> Add keyskill
                </a>
              </li>
            </ul> 
          </li> -->



         <!--  <li <?php echo($lasturl == 'all_category' || $lasturl == 'add_category' || $lasturl == 'add_sub_category' || $secondlasturl == 'edit_Category')?'class="active"':'';?>>
            <a href="#">
              <i class="fa fa-circle-o"></i>Role<i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li <?php echo($lasturl == 'all_role_category')?'class="active"':'';?>>
                <a href="{{url('admin/all_role_category')}}">
                  <i class="fa fa-angle-double-right"></i> All Role Category
                </a>
              </li>
              <li <?php echo($lasturl == 'add_role_category')?'class="active"':'';?>>
                <a href="{{url('admin/add_role_category')}}">
                  <i class="fa fa-angle-double-right"></i> Add Role
                </a>
              </li>
            </ul> 
          </li> -->

        </ul>
      </li> 

      <!-- End job center  -->


     <!-- start jobs  -->
        
      <li class="treeview <?php echo($secondlasturl == 'edit_Category' || $lasturl == 'add_category' || $lasturl == 'add_sub_category'  || $lasturl == 'all_category' || $lasturl == 'all_keyskills' || $lasturl == 'add_keyskills' || $lasturl == 'all_role_category' || $lasturl == 'add_role_category')?'active':'';?>">
        <a href="#">
          <i class="fa fa-files-o"></i>
          <span>Service Category</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">

          <!-- <li <?php echo($lasturl == 'all_event')?'class="active"':'';?>>
                <a href="{{url('admin/all_event')}}">
                  <i class="fa fa-angle-double-right"></i> All Event
                </a>
          </li>
           <li <?php echo($lasturl == 'add_event')?'class="active"':'';?>>
                <a href="{{url('admin/add_event')}}">
                  <i class="fa fa-angle-double-right"></i> Add Event
                </a>
          </li> -->
          
          <li <?php echo($lasturl == 'all_category' || $lasturl == 'add_category' || $lasturl == 'add_sub_category' || $secondlasturl == 'edit_Category')?'class="active"':'';?>>
            <a href="#">
              <i class="fa fa-circle-o"></i>Category List<i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li <?php echo($lasturl == 'all_category')?'class="active"':'';?>>
                <a href="{{url('admin/all_category')}}">
                  <i class="fa fa-angle-double-right"></i> All Category
                </a>
              </li>
              <li <?php echo($lasturl == 'add_category')?'class="active"':'';?>>
                <a href="{{url('admin/add_category')}}">
                  <i class="fa fa-angle-double-right"></i> Add Category
                </a>
              </li>
               <li <?php echo($lasturl == 'category')?'class="active"':'';?>>
                <a href="{{url('admin/add_sub_category')}}">
                  <i class="fa fa-angle-double-right"></i> Add SubCategory
                </a>
              </li>
            </ul> 
          </li>



           <li <?php echo($lasturl == 'all_keyskills' || $lasturl == 'add_keyskills' || $secondlasturl == 'edit_Category')?'class="active"':'';?>>
            <a href="#">
              <i class="fa fa-circle-o"></i>Key<i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li <?php echo($lasturl == 'all_keyskills')?'class="active"':'';?>>
                <a href="{{url('admin/all_keyskills')}}">
                  <i class="fa fa-angle-double-right"></i> All Keyskills
                </a>
              </li>
              <li <?php echo($lasturl == 'add_keyskills')?'class="active"':'';?>>
                <a href="{{url('admin/add_keyskills')}}">
                  <i class="fa fa-angle-double-right"></i> Add keyskill
                </a>
              </li>
            </ul> 
          </li>



           <li <?php echo($lasturl == 'all_category' || $lasturl == 'add_category' || $lasturl == 'add_sub_category' || $secondlasturl == 'edit_Category')?'class="active"':'';?>>
            <a href="#">
              <i class="fa fa-circle-o"></i>Role<i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li <?php echo($lasturl == 'all_role_category')?'class="active"':'';?>>
                <a href="{{url('admin/all_role_category')}}">
                  <i class="fa fa-angle-double-right"></i> All Role Category
                </a>
              </li>
              <li <?php echo($lasturl == 'add_role_category')?'class="active"':'';?>>
                <a href="{{url('admin/add_role_category')}}">
                  <i class="fa fa-angle-double-right"></i> Add Role
                </a>
              </li>
            </ul> 
          </li>

        </ul>
      </li>

  <!-- Recruiter List -->
        <li class="treeview">
          <a href="#">
          <i class="fa fa-building-o" aria-hidden="true"></i><span>Recruiter  List</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> All list</a></li>
           
          </ul>
        </li>

  <!-- Recruiter List -->

        <li class="treeview">
          <a href="{{url('admin/list_membership')}}">
            <i class="fa fa-book" aria-hidden="true"></i>
            <span>Membership</span> 
            <span class="label label-primary pull-right"></span>
          </a>
          
        </li>

        
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>


<style type="text/css">
  .navbar-nav>li>a {
    padding-top: 15px;
    padding-bottom: 35px;
}
</style>