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
      <h1>
        Dashboard
      </h1>
    </section>

     <section class="content">
      <?php echo Auth::user();
      echo date('Y-m-d', strtotime("+30 days")).'-----'.strtotime("+30 days");
      ?>
        <form id="" name="form" action="#" method="post">
          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <div class="table-responsive">
            <table class="table">
            <tr>
              <td>packages</td>
              <td>No of Post</td>

              <td>Days</td>
          
            </tr>

            <tr>
              <td colspan="8">Recruiter</td>
            </tr>
             <tr>
                <td><b>Free</b></td>
                <td><input type="hidden" name="" value="" sttle="">
                 <input type="text" name="" value="" class="form-control"></td>

                <td><input type="text" name="" value="" class="form-control"></td>
               <tr>
                <tr>
                <td><b>Paid</b></td>
                <td><input type="hidden" name="" value="" sttle="">
                 <input type="text" name="" value="" class="form-control"></td>

                <td><input type="text" name="" value="" class="form-control"></td>
               </tr>
                <tr>
                  <td colspan="8">Jobseeker</td>
                </tr>
             
                <tr>
                <td><b>Free</b></td>
                <td><input type="hidden" name="" value="" sttle="">
                 <input type="text" name="" value="" class="form-control"></td>

                <td><input type="text" name="" value="" class="form-control"></td>
             
                </tr>

                 <tr>
                <td><b>Paid</b></td>
                <td><input type="hidden" name="" value="" sttle="">
                 <input type="text" name="" value="" class="form-control"></td>

                <td><input type="text" name="" value="" class="form-control"></td>
             
                </tr>
            </table>
            </div>
          <div class="box-footer">
          <button type="submit" class='btn btn-primary btn-xs'>Update Package</button>
          </div>
        </form>
      </section>       

  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
    </div>
    <strong>Copyright &copy; 2016 <a href="#">Job Portal</a>.</strong> All rights
    reserved.
  </footer>

  
 

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="../plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
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
</body>
</html>

<!-- 


$starting_time = new DateTime('today');
$starting_time->modify('+1 day');

$ending_time = new DateTime('today');
$ending_time->modify('+1 day +23 hours +59 minutes +59 seconds');

$expired_tags = DB::table('tags')
        ->where('active', '=', 1)
        ->whereBetween('expiry_date', array($starting_time, $ending_time))
        ->get();



 -->