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

          


            <!-- =============================================== -->

            <!-- Left side column. contains the sidebar -->
            @include('admin/adminleftsidebar')

            <!-- =============================================== -->








      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           All Testimonials
            <!-- <small>coming soon</small> -->
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{url('admin/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Testimonials</a></li>
            <li class="active">All Testimonials</li>
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
                    <th style="width:10px;">S.No.</th>
                    <th data-orderable="false">Clients Name</th>
                    <th data-orderable="false">Content</th>
                    <th data-orderable="false">Company</th>
                    <th data-orderable="false">Image</th>
                    <th style="width: 100px;" data-orderable="false">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 

                  $i=1;
                  foreach($testimonials as $key=>$val){
                  $clientName = $testimonials[$key]->clientName;
                  $clientName = explode('_', $clientName);
                  $clientName = implode($clientName, ' ');
                  $file       = $testimonials[$key]->clientImage;
                 
                  ?>
                  <tr>
                    <td>{{$i}}</td>
                    <td style="text-transform: capitalize;">{{$clientName}}</td>
                    <td style="text-transform: capitalize;"><?PHP echo stripcslashes(substr($testimonials[$key]->testiMonial, 0, 50)); ?></td>
                    <td style="text-transform: capitalize;">{{ $testimonials[$key]->clientCompany }}</td>
                    <td style="text-transform: capitalize;"><img class="thumbnail" src="{{ url('testimonialsImages') }}/{{ $testimonials[$key]->clientImage }}" width="45" height="45" /></td>
                    
                    <td>
                      <a data-toggle="modal" data-target="#myModal{{$i}}" href="javascript:void(0);">Testimonial</a> |
                      <a href="{{url('admin/editTestimonial/'.$testimonials[$key]->id)}}">Edit</a> | <a onclick="return confirm('Delete this Testimonial?')" href="{{url('admin/deletetestimonial/'.$testimonials[$key]->id)}}">Delete</a>
                      <div class="modal fade" id="myModal{{$i}}">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            

                            
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Testimonial</h4>
                            </div>
                            <div class="modal-body">
                              <p id="">{{ $testimonials[$key]->testiMonial }}</p>
                              
                              
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              
                            </div>
                            </form>
                          </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                      </div><!-- /.modal -->
                    </td>
                    
                  </tr>
                  <?php 
                  $i++;
                  }?>
                  
                  
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