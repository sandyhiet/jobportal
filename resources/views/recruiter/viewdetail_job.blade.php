<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Recruiter Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

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

  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <!-- <span class="logo-mini"><b>A</b>LT</span> -->
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Welcome </b>Recruiter</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
     
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../../dist/images/edu2.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Resume Add Post</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../../dist/images/edu2.jpg" class="img-circle" alt="User Image">
                
              </li>
              <!-- Menu Body -->     
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{url('logout')}}" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
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
   <section class="content">

        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Job Details</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body">
              <p><strong>category:</strong>{{$job[0]->category_id}}</p>
              <p><strong>sub_category:</strong> {{$job[0]->sub_category_id}}</p>
              <p><strong>jobTitle:</strong> {{ $job[0]->jobTitle}}</p>
              <p><strong>country:</strong> {{$job[0]->country}}</p>
              <p><strong>state:</strong>{{$job[0]->state}}</p>
              <p><strong>city:</strong> {{$job[0]->city}}</p>
              <p><strong>requirements:</strong> {{ $job[0]->requirements}}</p>
              <p><strong>experiance:</strong> {{ $job[0]->experiance}}</p>
              <p><strong>salary_budget:</strong> {{ $job[0]->salary_budget}}</p>
              <p><strong>keySkill:</strong> {{$job[0]->keySkill}}</p>
            </div>

          </div>



<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Company Details</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body">
        
              <p><strong>companyName:</strong>{{$job[0]->companyName}}</p>
              <p><strong>mobileNumber1:</strong> {{$job[0]->mobileNumber1}}</p>
              <p><strong>mobileNumber2:</strong> {{ $job[0]->mobileNumber2}}</p>
              <p><strong>jobDescription:</strong>{{$job[0]->jobDescription}}</p>
              <p><strong> skills:</strong>{{$job[0]->skills}}</p>
              <p><strong>companywebsite:</strong>{{$job[0]->companywebsite}}</p>
              <p><strong>industries:</strong>{{$job[0]->industries}}</p>
              <p><strong>companyDescription:</strong> {{$job[0]->companyDescription}}</p>
              <p><strong>job_start_date:</strong> {{$job[0]->job_start_date}}</p>
              <p><strong>job_start_time:</strong> {{$job[0]->job_start_time}}</p>
              <p><strong>job_end_date:</strong> {{$job[0]->job_end_date}}</p>
              <p><strong>job_end_time:</strong> {{$job[0]->job_end_time}}</p>

              <p><strong>logo:</strong> {{$job[0]->logo}}</p>
              <p><strong>minsal:</strong> {{$job[0]->minsal}}</p>
              <p><strong>maxsal:</strong> {{$job[0]->maxsal}}</p>
              <p><strong>markfeatured:</strong> {{$job[0]->markfeatured}}</p>
              <p><strong>companyRole:</strong> {{$job[0]->companyRole}}</p>


              <p><strong>createdBy:</strong> {{$job[0]->createdBy}}</p>
              <p><strong>updatedBy  :</strong> {{$job[0]->updatedBy }}</p>
              <p><strong>created_at:</strong> {{$job[0]->created_at}}</p>
              <p><strong>updated_at:</strong> {{$job[0]->updated_at}}</p>
            
            </div>

          </div>

</section>



     
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
<!-- jQuery 2.1.4 -->
   
   

</body>
</html>