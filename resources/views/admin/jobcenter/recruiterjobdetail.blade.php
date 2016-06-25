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
        Job Post Details
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Job Center</a></li>
        <li class="active">Recruiter Job Post</li>
      </ol>
    </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Job Post Details <!-- <small>you can publish or save as a draft.</small> --></h3>
                </div><!-- /.box-header -->
                <div class="box-body pad">
               
                  <div class="col-lg-offset-8 col-md-8 col-sm-12">
                      <div class="col-lg-6">
                          <div class="pull-right">
                            <a href="<?php echo url('admin/approverecruiterjobpost/'.$postjobdetail[0]->id);?>" class="btn btn-success btn-sm">Approve</a>
                            <a href="<?php echo url('admin/rejectrecruiterjobpost/'.$postjobdetail[0]->id);?>" class="btn btn-danger btn-sm">Reject</a>
                          </div>
                      </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="row">
                      <div class="col-md-12 col-sm-12" style="height:50px; font-size:17px;">
                          <span class="label label-primary" style="font-weight:400">Job Details</span>
                      </div>
                    </div>
                     <div class="form-group">
                      <label for="">Email</label>
                      <input type="text" value="{{ $postjobdetail[0]->email }}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label for="">Job Title</label>
                      <input type="text" value="{{ $postjobdetail[0]->jobtitle }}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label for="">Location</label>
                      <input type="text" value="{{ $postjobdetail[0]->location }}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label for="">Region</label>
                      <input type="text" value="{{ $postjobdetail[0]->jobregion }}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label for="">Job Type</label>
                      <input type="text" value="{{ $postjobdetail[0]->jobtype }}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label for="">Job Category</label>
                      <input type="text" value="{{ $postjobdetail[0]->jobcategory }}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label for="">Description</label>
                      <textarea class="form-control" style="height:120px" readonly>{!! $postjobdetail[0]->jobdescription !!}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="">Application Email/URL</label>
                      <input type="text" value="{{ $postjobdetail[0]->joburl }}" class="form-control" readonly>
                    </div>
                  


                  </div>


                   <div class="col-lg-6">

                       <div class="row">
                          <div class="col-md-12 col-sm-12" style="height:50px; font-size:17px;">
                              <span class="label label-primary" style="font-weight:400">Company Details</span>
                          </div>
                        </div>
                       <div class="form-group">
                        <label for="">Company Name</label>
                        <input type="text" value="{{ $postcompanydetail[0]->companyname }}" class="form-control" readonly>
                      </div>
                      <div class="form-group">
                        <label for="">Tagline (Optional)</label>
                        <input type="text" value="{{ $postcompanydetail[0]->companytagline }}" class="form-control" readonly>
                      </div>
                      <div class="form-group">
                        <label for="">Description (Optional)</label>
                        <textarea class="form-control" style="height:150px" readonly>{!! $postcompanydetail[0]->companydescription !!}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="">Video (Optional)</label>
                        <input type="text" value="{{ $postcompanydetail[0]->video_url }}" class="form-control" readonly>
                      </div>
                      <div class="form-group">
                        <label for="">Website (Optional)</label>
                        <input type="text" value="{{ $postcompanydetail[0]->website_url }}" class="form-control" readonly>
                      </div>
                      <div class="form-group">
                        <label for="">Google+ Username (Optional)</label>
                        <input type="text" value="{{ $postcompanydetail[0]->google_username }}" class="form-control" readonly>
                      </div>
                      <div class="form-group">
                        <label for="">Facebook Username (Optional)</label>
                        <input type="text" value="{{ $postcompanydetail[0]->facebook_username }}" class="form-control" readonly>
                      </div>
                      <div class="form-group">
                        <label for="">LinkedIn Username (Optional)</label>
                        <input type="text" value="{{ $postcompanydetail[0]->linkedin_username }}" class="form-control" readonly>
                      </div>
                      <div class="form-group">
                        <label for="">Twitter Username (Optional)</label>
                        <input type="text" value="{{$postcompanydetail[0]->twitter_username }}" class="form-control" readonly>
                      </div>
                      <div class="form-group">
                        <label for="">Logo (Optional)</label>
                        
                        <?php
                          if ($postcompanydetail[0]->company_logo) {?>

                            <img style="width:100px;" class="thumbnail" src="{{url('jobpostimage/thumb220x100/'.$postcompanydetail[0]->company_logo)}}">
                           
                          <?php } ?>
                     </div>


                   </div>
                </div>
              
                </div>

              </div><!-- /.box -->

              
            </div><!-- /.col-->
          </div><!-- ./row -->
        </section>
        
         @include('admin/adminfooter')
       
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
