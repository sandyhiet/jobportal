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
           Add New Page
            <!-- <small>coming soon</small> -->
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">CMS</a></li>
            <li class="active">Add New Page</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Add New Page <!-- <small>you can publish or save as a draft.</small> --></h3>
                </div><!-- /.box-header -->
                <div class="box-body pad">
                  @include('layout.error-notification')
                  <form action="{{url('saveNewPage')}}" method="post">
                  <!-- {!! Form::open(array('url'=>'saveNewPage','method'=>'post','files'=>'true')) !!} -->
                    <div class="form-group">
                      <label for="">Title</label>
                      <input name="PageTitle" type="text" value="{{ old('PageTitle') }}" class="form-control" id="" placeholder="Maximum 25 characters allowed." maxlength="25">
                      <p class="help-block pull-right">Special Characters not allowed.</p>
                    </div>
                     <div class="form-group">
                      <label for="">Page Title</label>
                      <input name="page_title" type="text" value="{{ old('page_title') }}" class="form-control"  maxlength="25">
                      <p class="help-block pull-right">*Required</p>
                    </div>
                     <div class="form-group">
                      <label for="">Meta Keywords</label>
                      <input name="metakeywords" type="text" value="{{ old('metakeywords') }}" class="form-control">
                      <p class="help-block pull-right">*Required</p>
                    </div>
                     <div class="form-group">
                      <label for="">Meta Description</label>
                      <input name="metadescription" type="text" value="{{ old('metadescription') }}" class="form-control">
                      <p class="help-block pull-right">*Required</p>
                    </div>
                    <div class="form-group"  style="height:500px;">
                      <label for="">Content</label>
                      <textarea name="PageContent" id="editor1" name="editor1">{{ old('PageContent') }}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="">Main Image</label>
                      <input type="file" name="PageImage" class="form-control" id="" placeholder="upload jpg or png image">
                      <p class="help-block">upload 750X395 Pixels jpg or png image.</p>
                    </div>

                    <label class="radio-inline">
                      <input name="PageStatus" value="1" checked="checked" type="radio"> Published
                    </label>
                    <label class="radio-inline">
                      <input name="PageStatus" type="radio" value="0"> Save as draft
                    </label>

                    <div class="checkbox">
                      <label>
                        <input name="onNavigation" value="1" type="checkbox" checked="checked"> Include in menu options
                      </label>
                    </div>
                </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>

              </div><!-- /.box -->

              
            </div><!-- /.col-->
          </div><!-- ./row -->
        </section>
        
      </div><!-- /.content-wrapper -->

      @include('admin/adminfooter')

      
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
    <!-- CK Editor -->
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
