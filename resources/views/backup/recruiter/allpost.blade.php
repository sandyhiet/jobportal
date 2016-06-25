<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Recruiter Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

  <link href="css/style.css" rel="stylesheet">
  <!-- <script src="../ckeditor.js"></script>
  <script src="js/sample.js"></script>
  <link rel="stylesheet" href="css/samples.css">
  <link rel="stylesheet" href="toolbarconfigurator/lib/codemirror/neo.css"> -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

 
  <!-- Left side column. contains the logo and sidebar -->




    @include('recruiter/recruiterleftsidebar')







  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="margin-left:18px;">
        Dashboard
      
      </h1>
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
                    <th>SN.</th>
                    <th>category</th>
                    <th>sub_category</th>
                    <th>jobtitle</th>
                    <th>country</th>
                    <th>state</th>
                    <th>city</th>
                    <th>action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $i=1;
                  foreach($job as $key=>$val){
                  $category_id                = $job[$key]->category_id;
                  $sub_category_id            = $job[$key]->sub_category_id;
                  $jobTitle                   = $job[$key]->jobTitle;
                  $country                    = $job[$key]->country;
                  $state                      = $job[$key]->state;
                 $city                        = $job[$key]->city;
                  ?>
              <tr>
                <td style="text-transform: capitalize;">{{$i}}</td>
                <td style="text-transform: capitalize;">{{$category_id}}</td>
                <td style="text-transform: capitalize;">{{$sub_category_id}}</td>
                <td style="text-transform: capitalize;">{{$jobTitle}}</td>
                <td style="text-transform: capitalize;">{{$country}}</td>
                <td style="text-transform: capitalize;">{{$state}}</td>
                <td style="text-transform: capitalize;">{{$city }}</td>


                <td><a href="{{url('recruiter/viewdetail_job/'.$job[$key]->id)}}">view</a>|<a href="{{('job_update/'.$job[$key]->id)}}">Edit</a> | 
                <a onclick="return confirm('Delete this job Details?')" href="{{url('delete_job/'.$job[$key]->id)}}">Delete</a></td>
              </tr>
                <?php $i++; }?>

                </tbody>
                    
              </table>
            </div><!-- /.box-body -->
           
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
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="../plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>

</body></html>