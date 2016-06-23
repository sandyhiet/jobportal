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
            Update Page
            <!-- <small>coming soon</small> -->
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">CMS</a></li>
            <li class="active">Update Page</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Update Page <!-- <small>you can publish or save as a draft.</small> --></h3>
                </div><!-- /.box-header -->
                <div class="box-body pad">
                  <?php
                  $PageContent = '';
                  if(old('PageContent') != ''){
                    $PageContent = old('PageContent');
                  } else {
                    $PageContent = $Page[0]->PageContent;
                  }
                  $PageTitle = '';
                  $PageTitle = $Page[0]->PageTitle;
                  $PageTitle = explode('_', $PageTitle);
                  $PageTitle = implode($PageTitle, ' ');
                  if(old('PageTitle') != ''){
                    $PageTitle = old('PageTitle');
                  }
                  $PageStatus = 0;
                  if(old('PageStatus') != ''){
                    $PageStatus = old('PageStatus');
                  } else {
                    $PageStatus = $Page[0]->PageStatus;
                  }
                  $onNavigation = $Page[0]->onNavigation;
                  ?>
                  @include('layout.error-notification')
                  {!! Form::open(array('url'=>'editPage','method'=>'post','files'=>'true')) !!}
                    <div class="form-group">
                      <label for="">Title</label>
                      <input type="hidden" name="oldPageTitle" value="{{$Page[0]->PageTitle}}">
                      <input name="PageTitle" type="text" value="{{ $PageTitle }}" class="form-control" id="" placeholder="Maximum 25 characters allowed." maxlength="25">
                      <p class="help-block pull-right">Special Characters not allowed.</p>
                    </div>
                    <div class="form-group">
                      <label for="">Page Title</label>
                      <input name="page_title" type="text" value="{{$Page[0]->page_title}}" class="form-control"  maxlength="25">
                      <p class="help-block pull-right">*Required</p>
                    </div>
                     <div class="form-group">
                      <label for="">Meta Keywords</label>
                      <input name="metakeywords" type="text" value="{{$Page[0]->metakeywords}}" class="form-control">
                      <p class="help-block pull-right">*Required</p>
                    </div>
                     <div class="form-group">
                      <label for="">Meta Description</label>
                      <input name="metadescription" type="text" value="{{$Page[0]->metadescription}}" class="form-control">
                      <p class="help-block pull-right">*Required</p>
                    </div>
                    <div class="form-group"  style="height:500px;">
                      <label for="">Content</label>
                      <textarea name="PageContent" id="editor1" name="editor1">{{ $PageContent }}</textarea>
                    </div>
                    <?php if($Page[0]->PageImage){?>
                    <img style="width:150px;" src="{{url('pageImage/'.$Page[0]->PageImage)}}">
                    <?php }?>
                    <div class="form-group">
                      <label for="">Main Image</label>
                      <input type="hidden" name="oldPageImage" value="{{$Page[0]->PageImage}}">
                      <input type="file" name="PageImage" class="form-control" id="" placeholder="upload jpg or png image">
                      <p class="help-block">upload 750X395 Pixels jpg or png image.</p>
                    </div>
                    <label class="radio-inline">
                      <input name="PageStatus" value="1" <?php echo($PageStatus == 1)?'checked="checked"':'';?> type="radio"> Published
                    </label>
                    <label class="radio-inline">
                      <input name="PageStatus" type="radio" <?php echo($PageStatus == 0)?'checked="checked"':'';?> value="0"> Save as draft
                    </label>

                    <div class="checkbox">
                      <label>
                        <input name="onNavigation" value="1" <?php echo($onNavigation == 1)?'checked="checked"':'';?> type="checkbox"> Include in menu options
                      </label>
                    </div>
                  
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

      @include('admin/adminfooter')

      
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="{{url('plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{url('js/bootstrap.min.js')}}"></script>
    <!-- SlimScroll -->
    <script src="{{url('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{url('plugins/fastclick/fastclick.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{url('js/adminjs.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{url('js/demo.js')}}"></script>
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
