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

          


      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      @include('admin/adminleftsidebar')

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Membership Package
            

          </h1>
          <ol class="breadcrumb">
            <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Membership</a></li>
            <li class="active">Update Package</li>
          </ol>
        </section>
        @include('layout.error-notification')
        <!-- Main content -->
        <section class="content">

          <?php 
          $tbl_package = DB::table('tbl_package')->get();
          
          ?>

          
            <form id="" name="form" action="{{url('updatepackage')}}" method="post">
                   <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">



                    
                   
            <div class="row">
                <?php
                $i=1;
                foreach ($tbl_package as $key => $value) {
                   ?>
                   <input type="hidden" value="1001" name="id{{$i}}">

                  <div class="row">
                         <div class="col-sm-3">
                          
                            <div class="form-group">
                              <label>Award Job</label>
                              <input type="text" name="award_job{{$i}}" value="{{$tbl_package[$key]->award_job}}" class="form-control">
                            </div>
                           </div> 
                        </div>
                    
                        <?php 
                        $i++;
                        }?>
                   

                  <?php
                  $i=1;
                  foreach ($tbl_package as $key => $value) {
                  ?>
                   <input type="hidden" value="1002" name="id{{$i}}">

                  <div class="row">
                        <div class="col-sm-3">
                        
                            <div class="form-group" style="margin-left: 10px;">
                              <label>Days</label>
                              <input type="text" value="{{$tbl_package[$key]->days}}" name="days{{$i}}" class="form-control">
                            </div>
                          </div>
                    </div>
                  <?php 
                  $i++;
                  }?>
                 


                  <?php
                  $i=1;
                  foreach ($tbl_package as $key => $value) {
                  ?>
                   <input type="hidden" value="1003" name="id{{$i}}">

                      <div class="row">
                        <div class="col-sm-3">
                         
                            <div class="form-group" style="margin-left: 10px;">
                              <label>Charges</label>
                              <input type="text" value="{{$tbl_package[$key]->charge}}" name="charge{{$i}}" class="form-control">
                            </div>
                          </div>
                      </div>
                  <?php $i++;
                  }?>
                  </div>                  

              
                   <div class="box-footer">
                    <button type="submit" class='btn btn-primary btn-xs'>Update Package</button>
                  </div><!-- /.box-footer -->
                </form>
        

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


      
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
</body>
</html>

    <script>
      $(function () {
        $(".select2").select2(); 
      });
    </script>
  </body>
</html>
