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
           All Key Skill 
            <!-- <small>Featured Post Content</small> -->
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Skill</a></li>
            <li class="active">All KeySkill</li>
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

              @include('layout.error-notification')
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="width: 40px;">SN.</th>
                    <th data-orderable="false">Key Skill</th>
                    <th style="width: 100px;" data-orderable="false">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $i=1;
                  foreach($all_keyskills as $key=>$val){

                    $Keyskill_name      = $all_keyskills[$key]->Keyskill_name;
                  ?>
                  <tr>
                    <td style="text-transform: capitalize;">{{$i}}</td>

                    <td style="text-transform: capatalize;">{{$Keyskill_name}}
                    
                    <td>
                      <a href="{{url('admin/edit_subcategory/'.$all_category[$key]->sub_category_id)}}">Edit</a> | 
                      <a onclick="return confirm('Delete this Category?')" 
                      href="{{url('deletesubcategory/'.$all_category[$key]->sub_category_id)}}">Delete</a>
                    </td>
                    
                  </tr>
                  <?php $i++; } ?>
                  
                  
                </tbody>
                    
                  </table>
            </div><!-- /.box-body -->
            <div class="box-footer"></div><!-- /.box-footer-->
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

     <!--  @include('admin/adminfooter')
 -->
      
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="{{url('plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{url('js/bootstrap.min.js')}}"></script>
    <!-- DataTables -->
    <script src="{{url('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
    <!-- SlimScroll -->
    <script src="{{url('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{url('plugins/fastclick/fastclick.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{url('js/adminjs.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{url('js/demo.js')}}"></script>
    <script>
      $(function () {
        $("#example1").DataTable();
      });
    </script>
  </body>
</html>
