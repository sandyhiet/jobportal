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
           Update News
            <!-- <small>coming soon</small> -->
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{url('admin/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Update News</a></li>
            <li class="active">Update News</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Update News <!-- <small>you can publish or save as a draft.</small> --></h3>
                </div><!-- /.box-header -->
                <div class="box-body pad">
                  @include('layout.error-notification')
                  <form id="" action="{{url('updateNews')}}" method="post" enctype="multipart/form-data">
                   <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
              
                  <input type="hidden" name="id" value="{{ $news[0]->id }}">
                    <div class="form-group">
                      <label for="">News Title</label>
                      <?php
                      $newsTitle      = $news[0]->newsTitle;
                      $newsTitle      = explode('_', $newsTitle);
                      $newsTitle      = ucfirst(implode($newsTitle, ' '));
                      ?>
                      <input type="hidden" name="oldnewsTitle" value="{{$news[0]->newsTitle}}">
                      <input name="newsTitle" type="text" value="{{ $newsTitle }}" class="form-control" id="" placeholder="Maximum 30 characters allowed." maxlength="30">
                      <p class="help-block pull-right">Special Characters not allowed.</p>
                    </div>
                    
                    <div class="form-group">
                      <label for="">Name</label>
                      <input name="name" type="text" value="{{ $news[0]->name }}" class="form-control" id="" placeholder="Maximum 30 characters allowed." maxlength="30">
                      <p class="help-block pull-right">Special Characters not allowed.</p>
                    </div>
                    <div class="form-group">
                      <label>Date</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="date" class="form-control" value="{{ $news[0]->date }}" name="date" placeholder="Enter Timeline Date">
                      </div>
                       <span class="pull-right text-danger">*Required</span>
                    </div>
                     <div class="form-group">
                      <label for="">Content</label>
                      <textarea class="form-control" style="height:300px;" name="newsDescription">{{$news[0]->newsDescription}}</textarea>
                    </div>

                    <!-- <div class="form-group"  >
                      <label for="">Content</label>
                      <textarea name="newsDescription" id="editor1" style="height:200px;width:100%;">{{$news[0]->newsDescription}}</textarea>
                    </div> -->
                    <?php if($news[0]->newsImage){?>
                    <img style="width:150px;" src="{{url('newsImages/'.$news[0]->newsImage)}}">
                    <?php }?>
                    <div class="form-group">
                      <label for="">Main Image</label>
                      <input type="hidden" name="oldnewsImage" value="{{$news[0]->newsImage}}">
                      <input type="file" name="newsImage" class="form-control" id="" placeholder="upload jpg or png image">
                      <p class="help-block">Upload 800X530 Pixels jpg or png image.</p>
                    </div>
                   
                    <label class="radio-inline">
                      <input name="status" value="1" <?php echo($news[0]->status == 1)?'checked="checked"':'';?> type="radio"> Published
                    </label>
                    <label class="radio-inline">
                      <input name="status" type="radio" value="0" <?php echo($news[0]->status == 0)?'checked="checked"':'';?>> Save as draft
                    </label>
                  
                </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
                </form>

              </div><!-- /.box -->

              
            </div><!-- /.col-->
          </div><!-- ./row -->
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

    <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script>
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1', {height: 370});
       
        
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });
    </script>
  </body>
</html>