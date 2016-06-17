<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

 
 <link rel="{{url('stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css')}}">
  
  <link rel="stylesheet" href="/resources/demos/style.css">
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

     

      <!-- Left side column. contains the sidebar -->
      @include('admin/adminleftsidebar')

       <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Home Page
            <small>Banners</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Homepage</a></li>
            <li class="active">Banner</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          

          <div class="row">
            <div class="col-md-12">

              <div class="box box-widget">
                <div class='box-header with-border'>
                  Add New Banner
                </div><!-- /.box-header -->
                
               
                 <form id="" action="{{url('work')}}" method="post" enctype="multipart/form-data">
                   <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                  <div class='box-body'>

                    @include('layout.error-notification')
                    
                    <div class="form-group">
                      <label>Banner Image</label>
                      <input type="file" name="sliderImage" class="form-control">
                    </div>
                   
                    <div class="col-lg-6">
                      <div class="row">
                        <div class="form-group">
                          <label>Heading1</label>
                          <input type="text" name="title" value="{{old('title')}}" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="row">
                        <div class="form-group" style="margin-left: 10px;">
                          <label>Content</label>
                          <textarea name="content"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="row">
                        <div class="form-group" >
                          <label>Status</label>
                          <input type="radio" name="status" value="1" >ACTIVE
                          <input type="radio" name="status" value="0" >DE-ACTIVE
<!--                           
 -->                    </div>
                      </div>
                    </div>
                    
                      </div><!-- /.box-body -->
                  <div class='box-footer box-comments'>
                    Upload 1600 X 900 pixels png or jpg image.
                  </div><!-- /.box-footer -->
                  <div class="box-footer">
                    <button type="submit" class='btn btn-primary btn-xs'>Add Banner</button>
                  </div><!-- /.box-footer -->
                </form>
              </div>
              
            </div>
             <?php 
                  if(sizeof($work_details)>0){

                  foreach($work_details as $key=>$val){

                  $title              = $home_slider[$key]->title;
                  $content              = $home_slider[$key]->content;
                  $status                = $home_slider[$key]->status;
             ?>

       

            <div class="col-md-6" >
              <!-- Box Comment -->
              <div class="box box-widget">
                <div class='box-header with-border'>
                  <!-- Banner Title -->
                </div><!-- /.box-header -->
              <div id="draggable" class="ui-widget-content">
                <div class='box-body'>
                  <img class="img-responsive pad" src="{{url('sliderHomeImage/thumb501x248/'.$work_details[$key]->sliderImage)}}" alt="">
                  

                  
                  <h4><b>Heading1: </b>{{$title}}</h4>
                  
                  <h5><b>Heading2: </b>{{$content}}</h5>
                  
                  <p><b>Text: </b>{{$status}}</p>
                  
                  
                </div>
               
                <!-- /.box-footer -->
              </div>
              </div><!-- /.box -->
            </div>
            <?php
            }}
            ?>
            
            
          </div>
          

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->


   


      
    </div><!-- ./wrapper -->

    
<!-- fghfghhf -->
    <script src="{{url('//code.jquery.com/jquery-1.10.2.js')}}"></script>
  <script src="{{url('//code.jquery.com/ui/1.11.4/jquery-ui.js')}}"></script>
  <!-- gfhfghfgh -->
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

   
  </body>
</html>
