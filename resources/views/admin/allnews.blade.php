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
            All News
            <!-- <small>coming soon</small> -->
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">News Articles</a></li>
            <li class="active">All News</li>
          </ol>
        </section>

        <!-- Main content -->
           
            @include('layout.error-notification')
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
                    <th style="width: 200px;">News Title</th>
                    <th data-orderable="false">News</th>
                    <th style="width: 80px;" data-orderable="false">Status</th>
                    <th style="width: 80px;" data-orderable="false">Action</th>

                  </tr>
                </thead>
                <tbody>
                  
                  <?php
                  
                  foreach ($news as $key => $New) {
                  
                  ?>
                  <tr>
                    
                    <td>
                      
                      <?php
                      $newsTitle      = $New->newsTitle;
                      $newsTitle      = explode('_', $newsTitle);
                      $newsTitle      = implode($newsTitle, ' ');
                      echo ucfirst($newsTitle);
                      ?>
                    </td>
                    <td>
                      <?php
                      $newsDesc = $New->newsDescription;
                      $len = strlen($newsDesc);
                      if($len > 200){
                        $newsDesc = substr($newsDesc, 0, 200).'...';
                      } 
                      echo ucfirst($newsDesc);
                      ?>
                      </td>
                      <td>

                        <?php 
                        $ancTxt = '';

                        if($New->status == '1'){
                            $ancTxt = '<span class="text-success">Published</span>';
                        }

                        if($New->status == '0'){
                            $ancTxt = '<span class="text-danger">Draft</span>';
                        }
                        echo $ancTxt;
                        ?>
                        
                      </td>
                  
                    <td>
                      
                        
                        <a href="{{ url('admin/edit_news/'.$New->newsTitle) }}">Edit</a>
                        |
                         <a href="{{ url('deleteNews/'.$New->newsTitle) }}" class="anchorLikeButton" onclick="return confirm('Are you sure? Delete {{ $New->newsTitle }} ')">Delete</a>
                    </td>
                  </tr>
                  <?php }?>
                  
                  
                </tbody>
                    <tfoot>
                      <tr>
                        <th style="width: 200px;">News Title</th>
                        <th data-orderable="false">News</th>
                        <th data-orderable="false">Status</th>
                        <th style="width: 100px;" data-orderable="false">Action</th>
                      </tr>
                    </tfoot>
                  </table>
            </div><!-- /.box-body -->
            <div class="box-footer"></div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->







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
