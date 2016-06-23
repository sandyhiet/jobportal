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
    <!-- Site wrapper -->
    <div class="wrapper">
    

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      @include('admin/adminleftsidebar')

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Update Address
            <!-- <small>coming soon</small> -->
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">CMS</a></li>
            <li class="active">Update Address</li>
          </ol>
        </section>
        

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Update Address <!-- <small>you can publish or save as a draft.</small> --></h3>
                </div><!-- /.box-header -->

                  <?php
                  $officename = stripslashes($contactus_address[0]->officename);
                  $address    = stripslashes($contactus_address[0]->address);
                  $phone1     = stripslashes($contactus_address[0]->phone1);
                  $phone2     = stripslashes($contactus_address[0]->phone2);
                  $email      = stripslashes($contactus_address[0]->email);
                  ?>
                  
                  <form action="{{url('admin/update_address')}}" method="post">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                  <input type="hidden" value="{{$contactus_address[0]->id}}" name="id">
                  <div class="box-body pad">
                    @include('layout.error-notification')
                    <div class="form-group">
                      <label for="">Office Name</label>
                      <input name="officename" type="text" value="{{$officename}}" class="form-control" id="" maxlength="50">
                      <span class="pull-right text-danger">*Required</span>
                    </div>
                    <div class="form-group">
                      <label for="">Address</label>
                      <input name="address" type="text" value="{{$address}}" class="form-control" maxlength="200">
                      <span class="pull-right text-danger">*Required</span>
                    </div>
                    <div class="form-group">
                      <label for="">Phone Number 1</label>
                      <input name="phone1" type="text" value="{{$phone1}}" class="form-control" maxlength="25" >
                    </div>
                     <div class="form-group">
                      <label for="">Phone Number 2</label>
                      <input name="phone2" type="text" value="{{$phone2}}" class="form-control" maxlength="25" >
                    </div>

                    <div class="form-group">
                      <label for="">Email</label>
                      <input name="email" type="text" value="{{$email}}" class="form-control" maxlength="50" >
                    </div>
                  
                </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
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

 <script>
      $(function () {
        $("#example1").DataTable();
      });
    </script>
  </body>
</html>