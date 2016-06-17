<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{url('bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{url('plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
  <!-- Theme style -->
<link rel="stylesheet" href="{{url('dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="{{url('dist/css/skins/_all-skins.min.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

 
 
      @include('admin/adminleftsidebar')
      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          Admin Profile
            <!-- <small>coming soon</small> -->
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{url('admin/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Admin Profile</li>
          </ol>
        </section>

        <?php
        
       
        $email = '';
      
        $oldimage = '';
        
        
        if(sizeof($admin_profile) > 0){
            
           
            $email_id          = $admin_profile[0]->email_id;
          
            $oldimage          = $admin_profile[0]->image;
          
           
        }
        ?>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Admin Profile <!-- <small>you can publish or save as a draft.</small> --></h3>
                </div><!-- /.box-header -->
                <div class="box-body pad">
                  @include('layout.error-notification')
                  <?php 

                     if (Auth::check() && Auth::user()->usertype == 'superadmin') { ?>
                      

                  

                    <?php   } elseif (Auth::check() && Auth::user()->usertype == 'subadmin') { ?>


               <form id="" action="{{url('savesubAdminProfile')}}" method="post">
                  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="form-group">
                      <label for="">Name</label>
                      <input name="name" type="text" value="{{ $subadmin_profile[0]->name }}" class="form-control" id="" placeholder="Enter Name" maxlength="50">
                      <span class="pull-right text-danger">*Required</span>
                    </div>

                    <div class="form-group">
                      <label for="">Email</label>
                      <input name="email" type="text" value="{{ $subadmin_profile[0]->email }}" class="form-control" id="" placeholder="Enter Email">
                      <span class="pull-right text-danger">*Required</span>
                    </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
           <?php  } ?>
           </div>



        <h2>Change Password</h2>
           <div class="box-body pad">
            <form class="form" method="POST" action="{{url('updatePassword')}}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <input type="hidden" name="kbfAdminChangePass" value="1">
               <!--  <div class="form-group">
                  <label for="">Old Password</label>
                  <input name="old_pass" type="password"  class="form-control" id="">
                </div> -->
                <div class="form-group">
                  <label for="">New Password</label>
                  <input name="new_pass" type="password"  class="form-control" id="">
                </div>
                <div class="form-group">
                  <label for="">Re-enter New Password</label>
                  <input name="re_new_pass" type="password"  class="form-control" id="">
                </div>
                <div class="form-group">
                  <button class="btn btn-primary btn-raised" type="submit">Change Password</button>
                </div>
           </form>
        </div><!-- /.box -->

              
            </div><!-- /.col-->
          </div><!-- ./row -->
        </section>
        
      </div><!-- /.content-wrapper -->

      @include('admin/adminfooter')

      
    </div><!-- ./wrapper -->

    <!-- jQuery 2.2.0 -->
<script src="{{url('plugins/jQuery/jQuery-2.2.0.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{url('bootstrap/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{url('plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('dist/js/app.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{url('plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{url('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{url('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- SlimScroll 1.3.0 -->
<script src="{{url('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- ChartJS 1.0.1 -->
<script src="{{url('plugins/chartjs/Chart.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{url('dist/js/pages/dashboard2.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('dist/js/demo.js')}}"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    <!-- Bootstrap WYSIHTML5 -->
    <script>
      $(function () {
       
        $( "#AdminDate" ).datepicker({
        'dateFormat':'yy-mm-dd',
        'changeMonth': true,
        'changeYear': true,
        'yearRange': '-100:+10', // last hundred years
       });

        $(".select2").select2(); 

         
        
        //bootstrap WYSIHTML5 - text editor
        //$(".textarea").wysihtml5();
      });
    </script>


  </body>
</html>
