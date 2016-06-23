<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>jobseeker Dashboard</title>
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




@include('jobseeker/jobseekerleftsidebar')







  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      
      </h1>
    </section>
             <?php
                        $users = DB::table('users')->select('*')->where('id', '=', Auth::user()->id)->get();
                       $resume_post = DB::table('resume_post')->select('*')->where('user_id', $users[0]->id)->get();


                      ?>






<?php 

foreach($resume_post as $key=>$val){
?>
                   
              <div style="text-align:right;margin-right: 15px;">
             
              <a class="btn btn-primary" href="{{url('jobseeker/resume_update/'.$resume_post[$key]->id)}}">Edit Profile</a>&nbsp;&nbsp;&nbsp;
              <a href="{{url('jobseekerImage/resume/'.$resume_post[0]->update_resume)}}"  class="btn btn-primary" download/>Download Resume </a>
              </div>
            
                         


   <section class="content" id="printable">

        <div class="box box-primary">
            <div class="box-header with-border">
               <h3 class="box-title">Profile</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body">

           
                       
                      

              <p><b>name:-</b>{{$resume_post[$key]->firstname}} {{$resume_post[$key]->lastname}}</p>
              <p><b>Your EmailId:-</b>{{$users[0]->email}}</p>
              
              <?php if($resume_post[$key]->file != ''){ ?>

              <p><b>Image:-</b><img src="{{url('jobseekerImage/thumb160x160/'.$resume_post[$key]->file)}}" alt=""></p>
              <?php } ?>
              <?php if($resume_post[$key]->title){ ?>
              <p><?php echo "<b>Title:-</b> ".($resume_post[$key]->title); ?></p>
              <?php } ?>
              <?php if($resume_post[$key]->video){ ?>
              <p><?PHP echo "<b>video:-</b> ".($resume_post[$key]->video); ?></p>
              <?php } ?>
            
              <?php if($resume_post[$key]->job_category != ''){ ?>
              <p><?PHP echo "<b>Jobcategory:-</b> ".($resume_post[$key]->job_category); ?></p>
              <?php } ?>

              <?php if($resume_post[$key]->country){ ?>
              <p><?PHP echo "<b>Country:-</b> ".($resume_post[$key]->country); ?></p>
              <?php } ?>
              <?php if($resume_post[$key]->state){ ?>

              <p><?PHP echo "<b>State:-</b> ".($resume_post[$key]->state); ?></p>
              <?php } ?>
              <?php if($resume_post[$key]->city){ ?>

              <p><?PHP echo "<b>City:-</b> ".($resume_post[$key]->city); ?></p>
              <?php } ?>
              <?php if($resume_post[$key]->skill){ ?>

              <p><?PHP echo "<b>Skill:-</b> ".($resume_post[$key]->skill); ?></p>
              <?php } ?>

              <?php if($resume_post[$key]->resume_content != ''){ ?>

              <p><?PHP echo "<b>Content:-</b> ".($resume_post[$key]->resume_content); ?></p>
              <?php } ?>
              <?php if($resume_post[$key]->choose_network){ ?>

              <p><?PHP echo "<b>Network:-</b> ".($resume_post[$key]->choose_network); ?></p>
              <?php } ?>
              <?php if($resume_post[$key]->url){ ?>

              <p><?PHP echo "<b>URL:-</b> ".($resume_post[$key]->url); ?></p>
              <?php } ?>

              <?php if($resume_post[$key]->employer){ ?>

              <p><?PHP echo "<h3>Experience Details:-</h3></br><b>Employer:-</b> ".($resume_post[$key]->employer); ?></p>
              <?php } ?>
              <?php if($resume_post[$key]->date != '0000-00-00'){ ?>

              <p><?PHP echo "<b>From:-</b> ".($resume_post[$key]->date); ?></p>
              <?php } ?>
              <?php if($resume_post[$key]->end_date != '0000-00-00'){ ?>

              <p><?PHP echo "<b>To:-</b> ".($resume_post[$key]->end_date); ?></p>
              <?php } ?>

              <?php if($resume_post[$key]->job_title){ ?>

              <p><?PHP echo "<b>Job Title:-</b> ".($resume_post[$key]->job_title); ?></p>
              <?php } ?>
              <?php if($resume_post[$key]->responsibilities){ ?>

              <p><?PHP echo "<b>Responsibilites:-</b> ".($resume_post[$key]->responsibilities); ?></p>
              <?php } ?>

              <?php if($resume_post[$key]->school_name){ ?>

              <p><?PHP echo "<h3>Education Details:-</h3></br><b>School Name:-</b> ".($resume_post[$key]->school_name); ?></p>
              <?php } ?>
              <?php if($resume_post[$key]->s_date != '0000-00-00'){ ?>

              <p><?PHP echo "<b>From:-</b> ".($resume_post[$key]->s_date); ?></p>
              <?php } ?>
              <?php if($resume_post[$key]->e_date != '0000-00-00'){ ?>

              <p><?PHP echo "<b>To:-</b> ".($resume_post[$key]->e_date); ?></p>
              <?php } ?>
              <?php if($resume_post[$key]->qualification){ ?>

              <p><?PHP echo "<b>Qualification:-</b> ".($resume_post[$key]->qualification); ?></p>
              <?php } ?>
              <?php if($resume_post[$key]->notes){ ?>

              <p><?PHP echo "<b>Notes:-</b> ".($resume_post[$key]->notes); ?></p>
              <?php } ?>
              <?php if($resume_post[$key]->experience){ ?>

              <p><?PHP echo "<b>Experience:-</b> ".($resume_post[$key]->experience); ?></p>
              <?php } ?>
             <?php if($resume_post[$key]->update_resume != ''){ ?>
              <p>Profile Resume:-<a href="{{url('jobseekerImage/resume/'.$resume_post[$key]->update_resume)}}" download>{{$resume_post[$key]->update_resume}}</a></p>

             <?php } ?>
                   
           
</div>
</div>
 </section>
 <?php 

 }
 ?>
 </div></div>
 


   






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

</body>
</html>





