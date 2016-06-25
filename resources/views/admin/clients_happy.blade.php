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


          <!-- Left side column. contains the sidebar -->
          @include('admin/adminleftsidebar')

          <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Clients Images
            <small>Clients Images</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Homepage</a></li>
            <li class="active">Filter Gallery</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          

          <div class="row">
            <div class="col-md-12">

              <div class="box box-widget">
                <div class='box-header with-border'>
                  Add New Image
                </div><!-- /.box-header -->
                <form action="{{url('Gallery_clients')}}" method="post" enctype="multipart/form-data">
                   <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                

                  <div class='box-body'>

                    @include('layout.error-notification')
                    
                    <div class="form-group">
                      <label>Image</label>
                      <input type="file" name="image" class="form-control">
                    </div>

                    
                   <!--  <div class="col-lg-6">
                      <div class="row">
                        <div class="form-group">
                          <label>Heading</label>
                          <input type="text" name="heading" value="{{old('heading')}}" class="form-control">
                        </div>
                      </div>
                    </div> -->
                   <!--  <div class="col-lg-6">
                      <div class="row">
                        <div class="form-group" style="margin-left: 10px;">
                          <label>Sub Heading</label>
                          <input type="text" value="{{old('subheading')}}" name="subheading" class="form-control">
                        </div>
                      </div>
                    </div> -->
                    <div class="form-group">
                      

                      
                      
                    </div>
                    
                    
                    
                    
                    
                  </div><!-- /.box-body -->
                  <div class='box-footer box-comments'>
                    Upload 133 X 69 pixels png or jpg image.
                  </div><!-- /.box-footer -->
                  <div class="box-footer">
                    <button type="submit" class='btn btn-primary btn-xs'>Add Image</button>
                  </div><!-- /.box-footer -->
                </form>
              </div>
              
            </div>
            <?php 
            if(sizeof($filter_gallery)>0){
            foreach($filter_gallery as $key=>$val){
            ?>
            <div class="col-md-3">
              <!-- Box Comment -->
              <div class="box box-widget">
                <div class='box-header with-border'>
                  <!-- Banner Title -->
                </div><!-- /.box-header -->
                <div class='box-body'>
                  <img class="img-responsive pad" src="{{url('gallery/filterGallery/thumb133x69/'.$filter_gallery[$key]->image)}}" alt="">
                 
                  
                </div>
                <div class="box-footer">
                 <a href="{{url('admin/update_clients/'.$filter_gallery[$key]->id)}}" class='btn btn-info btn-xs'><i class='fa fa-edit'></i> Edit</a>
                   <a onclick="return confirm('Delete this image?')" href="{{url('delete_clients/'.$filter_gallery[$key]->id)}}" class='btn btn-danger btn-xs'><i class='fa fa-trash'></i> Delete</a>
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div>
            <?php }}?>
            
            
          </div>

        </section>
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

  <script>
      $(function () {
        $(".select2").select2(); 
      });
    </script>
  </body>
</html>
