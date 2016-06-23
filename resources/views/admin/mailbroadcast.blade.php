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
            &nbsp;
            <!-- <small>coming soon</small> -->
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboared</a></li>
            <li><a href="#">Broadcast</a></li>
            <li class="active">Compose Email</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Compose Email <!-- <small>you can publish or save as a draft.</small> --></h3>
                </div><!-- /.box-header -->
                <div class="box-body pad">
                  @include('layout.error-notification')
                  <form action="{{url('postComposeEmail')}}" method="post">
                    <div class="form-group">
                      <label for="">Send To </label>
                      <input name="SendMessageTo" type="text" value="{{ old('SendMessageTo') }}" class="form-control" id="" placeholder="Subscribers." value="Subscribers" readonly>                      
                    </div>
                    <div class="form-group">
                      <label for="">Subject</label>
                      <input name="Subject" type="text" value="{{ old('Subject') }}" class="form-control" id="" placeholder="Subject.">       
                    </div>
                    
                    <div class="form-group" >
                      <label for="">Message</label>
                      <textarea name="Message" class="form-control"  name="editor1" style="height:150px;">{{ old('Message') }}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="">Attachment</label>
                      <input type="file" name="Attachment" class="form-control" id="" placeholder="upload jpg or png image">
                      <!-- <p class="help-block">upload 555X530 Pixels jpg or png image.</p> -->
                    </div>
                    <!-- <div class="form-group">
                      

                      <label>See More link</label>
                      <select name="link" class="form-control select2" style="width: 100%;">
                        <option value="">Select</option>
                        <?php
                        $all_pages_links = DB::table('Pages')->select('*')->get();
                        foreach($all_pages_links as $key=>$val){
                          $PageTitle = $all_pages_links[$key]->PageTitle;
                          $PageTitle = explode('_', $PageTitle);
                          $PageTitle = implode($PageTitle, ' ');
                        ?>
                        <option <?php echo($all_pages_links[$key]->PageTitle == old('link'))?'selected="selected':'';?> value="{{$all_pages_links[$key]->PageTitle}}">{{$PageTitle}}</option>
                        <?php }?>
                        
                      </select>
                      
                    </div> -->
                    
                  
                </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Send</button>
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
    <!-- Bootstrap WYSIHTML5 -->
    <script>
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        //CKEDITOR.replace('editor1', {height: 370});
        $(".select2").select2(); 
        
        //bootstrap WYSIHTML5 - text editor
        //$(".textarea").wysihtml5();
      });
    </script>
  </body>
</html>
