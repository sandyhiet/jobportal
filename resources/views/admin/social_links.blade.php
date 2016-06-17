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
            Social Links
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Homepage</a></li>
            <li class="active">Social Links</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          

          <div class="row">
            <div class="col-md-12">

              <div class="box box-widget">
                <div class='box-header with-border'>
                  Update Social Links
                </div><!-- /.box-header -->
                
                
                  <div class='box-body'>

                    @include('layout.error-notification')
                    <?php
                    $socil_link_icon = '';
                    $i = 1;
                    foreach($social_links as $key => $val){
                      
                      switch ($social_links[$key]->social_network) {
                          case 'facebook':
                              $socil_link_icon = '<i class="fa fa-facebook"></i>';
                              break;
                          case 'twitter':
                              $socil_link_icon = '<i class="fa fa-twitter"></i>';
                              break;
                          case 'pinterest':
                              $socil_link_icon = '<i class="fa fa-pinterest-p"></i>';
                              break;
                          case 'youtube':
                              $socil_link_icon = '<i class="fa fa-youtube"></i>';
                              break;
                          case 'google_plus':
                              $socil_link_icon = '<i class="fa fa-google-plus"></i>';
                              break;
                          case 'flickr':
                              $socil_link_icon = '<i class="fa fa-flickr"></i>';
                              break;
                          default:
                              $socil_link_icon = '<i class="fa fa-dribbble"></i>';
                      }
                    ?>
                  <form action="{{url('update_social_links')}}" method="post">
                   <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="col-lg-6" style="margin-bottom: 15px;">
                      <div class="row">
                        <div class="input-group" <?php echo($i % 2 == 0)?'style="margin-left: 5px;"':'';?>>
                          <div class="input-group-addon">
                            {!!$socil_link_icon!!}
                          </div>
                            <input type="hidden" name="social_form" value="{{$social_links[$key]->social_network}}">
                            <input type="text" placeholder="{{$social_links[$key]->social_network}}" name="{{$social_links[$key]->social_network}}" value="{{$social_links[$key]->link}}" class="form-control pull-right">
                            <span class="input-group-btn">
                              <button type="submit" class="btn btn-primary btn-flat">Update</button>
                            </span>
                          
                        </div>
                      </div>
                    </div>
                    </form>
                    <?php 
                    $i++;
                    }
                    ?>
                    
                    
                    
                    
                    
                  </div>
                  
                  
                
              </div>
              
            </div>
            
            
            
          </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

       <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b></b> 
        </div>
        <strong>Copyright &copy; 2016 <a href="#">JOBPORTAL</a>.</strong> All rights
        reserved.
       </footer>

      
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

