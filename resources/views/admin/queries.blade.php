<?php
function time_elapsed_string($time) {
    //Let's set the current time
    $currentTime = time();
    //And the time the notification was set
    $time = strtotime($time);
    //Now calc the difference between the two
    return $timeDiff = floor(abs($currentTime - $time) / 60);

    //Now we need find out whether or not the time difference needs to be in
    //minutes, hours, or days
    if ($timeDiff < 2) {
        $timeDiff = "Just now";
    } elseif ($timeDiff > 2 && $timeDiff < 60) {
        $timeDiff = floor(abs($timeDiff)) . " minutes ago";
    } elseif ($timeDiff > 60 && $timeDiff < 120) {
        $timeDiff = floor(abs($timeDiff / 60)) . " hour ago";
    } elseif ($timeDiff < 1440) {
        $timeDiff = floor(abs($timeDiff / 60)) . " hours ago";
    } elseif ($timeDiff > 1440 && $timeDiff < 2880) {
        $timeDiff = floor(abs($timeDiff / 1440)) . " day ago";
    } elseif ($timeDiff > 2880) {
        $timeDiff = floor(abs($timeDiff / 1440)) . " days ago";
    }

    return $timeDiff;
}
?>
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
            All Queries
            <small>Queries from contact us from</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">CMS</a></li>
            <li class="active">All Queries</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <div class="box-body">

              @include('layout.error-notification')
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="width: 32px;">S No.</th>
                    <th style="width: 100px;">From</th>
                    
                    <th data-orderable="false">Message</th>
                    <th style="width: 100px;" data-orderable="false">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $i=1;
                  foreach($contactus_queries as $key=>$val){
                  $email      = stripslashes($contactus_queries[$key]->email);
                  $created_at = $contactus_queries[$key]->created_at;
                  $created_at = strtotime($created_at);
                  $created_at = date('d M Y g:i A', $created_at);
                  $status     = $contactus_queries[$key]->status;
                  
                  $feedback   = stripslashes(nl2br($contactus_queries[$key]->feedback));
                  
                  $feedback_len = strlen($feedback);
                  if($feedback_len > 100){
                    $feedback = substr($feedback, 0, 100).'...';
                  }
                  ?>
                  <tr>
                    <td style="text-transform: capitalize;">{{$i}}</td>
                    <td><span <?php echo($status == 0)?'style="font-weight:bold;"':'';?>>{{$email}}</span></td>
                    
                    <td>
                      <span <?php echo($status == 0)?'style="font-weight:bold;"':'';?>>
                        {!!$feedback!!}
                      </span><br>{{$created_at}}
                      <?php

                      //echo time();
                      //echo time_elapsed_string($created_at);


                      ?>
                    </td>
                    <td><a href="{{url('admin/read_query/'.$contactus_queries[$key]->id)}}">Read</a> | <a onclick="return confirm('Delete this message?')" href="{{url('admin/delete_queries/'.$contactus_queries[$key]->id)}}">Delete</a></td>
                    
                  </tr>
                  <?php 
                  $i++;
                  }?>
                  
                  
                </tbody>
                    <tfoot>
                      <tr>
                        <th>From</th>
                        <th>From</th>
                        
                        <th>Message</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
            </div><!-- /.box-body -->
            <div class="box-footer"></div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->
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
