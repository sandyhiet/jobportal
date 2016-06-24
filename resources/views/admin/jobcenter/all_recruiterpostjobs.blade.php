<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{$pagetitle}}</title>
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
          All Post Jobs
            <!-- <small>coming soon</small> -->
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Job Center</a></li>
            <li class="active">Recruiter Job Post</li>
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

              @include('layouts.error-notification')
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    
                    <th data-orderable="false">SN.</th>
                    <th data-orderable="false">Company name</th>
                    <th data-orderable="false">Job title</th>
                    <th data-orderable="false">Location</th>
                    <th data-orderable="false">Job type</th>
                    <th data-orderable="false">Status</th>
                    <th style="width: 80px;" data-orderable="false">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 

                      $i=1;
                      foreach($recruiter_postjob as $key=>$val){
                      $companyname = ucfirst($recruiter_postjob[$key]->companyname);
                      $jobtitle = ucfirst($recruiter_postjob[$key]->jobtitle);
                      $location = ucfirst($recruiter_postjob[$key]->location);
                      $jobtype = ucfirst($recruiter_postjob[$key]->jobtype);
                      $status = $recruiter_postjob[$key]->status;
                   ?>

                  <tr>
                    
                    <td style="text-transform: capitalize;">{{$i}}</td>
                    <td style="text-transform: capitalize;">{{$companyname}}</td>
                    <td style="text-transform: capitalize;">{{$jobtitle}}</td>
                    <td style="text-transform: capitalize;">{{$location}}</td>
                    <td style="text-transform: capitalize;">{{$jobtype}}</td>
                    <td style="text-transform: capitalize;">
                      <?php 
                        if ($status == 0) {
                         echo "<span style='color:red;'>Rejected</span>";
                        }elseif ($status == 1) {
                          echo "<span style='color:green;'>Approved</span>";
                        }else{
                          echo 'Approval Pending';

                        }

                      ?>
                     

                    </td>
                    
                    <td>
                       <a href="{{url('admin/recruiterjobdetails/'.$recruiter_postjob[$key]->id)}}">View Detail</a> | <a onclick="return confirm('Delete this Job?')" href="{{url('deleteRecruiterPostjob/'.$recruiter_postjob[$key]->id)}}">Delete</a>
                    </td>
                    
                  </tr>
                  <?php  $i++; }?>
                  
                  
                </tbody>
                   
                  </table>
            </div><!-- /.box-body -->
            <div class="box-footer"></div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->

       </div>
</div>

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