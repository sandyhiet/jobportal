<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Recruiter Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <link href="css/style.css" rel="stylesheet">
  <!-- AdminLTE Skins. Choose a skin from the css/skins


       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

 
  <!-- Left side column. contains the logo and sidebar -->
     @include('recruiter/recruiterleftsidebar')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
    </section>

    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Job Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
             @include('layout.error-notification')
            <form  name="form" method="POST" action="{{url('recruiter_update')}}">
             <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
             <input type="hidden" value="{{ $job[0]->id }}" name="recruiterr_id">
              <div class="box-body">
                <div class="form-group" id="job-category-group">
                <label for="job-category">Category</label>
                <select onchange="ajaxGetSubCat(this.value)" class="form-control" id="category_id" name="category_id">
                  <option value="">Select category</option>
                  <?php
                  $category = DB::table('tbl_category')->get();
                 foreach ($category as $key => $value) {
                   ?>
                  <option value="{{$category[$key]->category_id}}">{{$category[$key]->category_name}}</option>
                  <?php }?>
                </select>
              </div>
               <div class="form-group" id="job-type-group">
                <label for="job-type">Sub Category</label>
                <select  class="form-control" id="subcatselect" name="sub_category_id" >
                  <option>Select Subcategory</option>
                  
                  <option></option>
                    
                </select>
              </div>
                <div class="form-group" id="job-title-group">
                <label for="job-title">Title</label>
                <input type="text" class="form-control" id="jobTitle" placeholder="" name="jobTitle" value="{{$job[0]->jobTitle}}">
              </div>
              <div class="form-group" id="">
                <label for="job-location">Country</label>
                <select class="form-control" id="country" placeholder="" name="country">
                  <option>Select</option>
                   <?php
                      $countries = DB::table('tbl_country')->select('*')->get();
                      foreach($countries as $key=>$val){
                      ?>
                      <option value="{{$countries[$key]->country_value}}">{{$countries[$key]->country_name}}</option>
                      <?php }?>
                </select> 
              </div>
              <div class="form-group" id="">
                <label for="job-region">State</label>
                <select  class="form-control" id="state" placeholder="" name="state">
                  <option>Select</option>
                  <?php
                    $state = DB::table('tbl_state')->select('*')->get();
                    foreach($state as $key=>$val){
                    ?>
                    <option value="{{$state[$key]->state_name}}">{{$state[$key]->state_name}}</option>
                    <?php }?>
                </select>
              
              </div>
               <div class="form-group" id="">
                <label for="job-region">City</label>
                <select  class="form-control" id="city" placeholder="" name="city">
                  <option>Select</option>
                  <?php
                    $city = DB::table('tbl_city')->select('*')->get();
                    foreach($city as $key=>$val){
                    ?>
                    <option value="{{$city[$key]->city_name}}">{{$city[$key]->city_name}}</option>
                    <?php }?>
                </select>
              </div>
              <div class="form-group" id="">
                <label for="">Requirements</label>
                <input type="text" class="form-control" id="requirements" placeholder="" name="requirements" value="{{$job[0]->requirements}}">
                <div class="form-group" id="">
                <label for="">Experiance</label>
                <input type="text" class="form-control" id="experiance" placeholder="" name="experiance" value="{{$job[0]->experiance}}">
             </div>
             <div class="form-group" id="">
                <label for="">Salary BudgetL</label>
                <input type="text" class="form-control" id="salary_budget" placeholder="" name="salary_budget" value="{{$job[0]->salary_budget}}">
             </div>
              <div class="form-group" id="">
                <label for="">Key Skill</label>
                <input type="text" class="form-control" id="keySkill" placeholder="" name="keySkill" value="{{$job[0]->keySkill}}" >
             </div>
             </div>
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Company Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
                <div class="form-group" id="company-name-group">
                <label for="company-name">Company Name</label>
                <input type="text" class="form-control" id="companyName" placeholder="" name="companyName" value="{{$job[0]->companyName}}">
              </div>
               <div class="form-group" id="company-tagline-group">
                <label for="company-tagline">Mobile1</label>
                <input type="text" id="mobileNumber1" class="form-control" name="mobileNumber1" value="{{$job[0]->mobileNumber1}}" >
              </div>
              <div class="form-group">
                <label>Mobile2</label>
                  <input type="text" id="mobileNumber2" class="form-control" name="mobileNumber2" value="{{$job[0]->mobileNumber2}}" >
             </div>
              <div class="form-group" id="company-video-group">
                <label for="company-video">Description</label>
                 <textarea class="form-control" rows="5" placeholder="Enter ..." name="companyDescription" id="companyDescription">{{$job[0]->companyDescription}}</textarea>
              </div>
              <div class="form-group" id="company-website-group">
                <label for="company-website">Website (Optional)</label>
                <input type="text" class="form-control" id="companywebsite" placeholder="http://" name="companywebsite" value="{{$job[0]->companywebsite}}">
              </div>
           
              <div class="form-group" id="">
                <label for="company-facebook">Industry</label>
                <input type="text" class="form-control" id="industries" placeholder=""  name="industries" value="{{$job[0]->industries}}">
              </div>
              <div class="form-group" id="">
                <label for="">Role</label>
                <input type="text" class="form-control" id="companyRole" placeholder="" name="companyRole" value="{{$job[0]->companyRole}}">
              </div>
              <div class="form-group" id="">
                <label for="">Starting Date</label>
                <input type="date" class="form-control" id="job_start_date" placeholder="" name="job_start_date" value="{{$job[0]->job_start_date}}">
              </div>
              
              <div class="form-group" id="">
                <label for="">End Date</label>
                <input type="date" class="form-control" id="job_end_date" placeholder="" name="job_end_date" value="{{$job[0]->job_end_date}}">
              </div>
              <div class="form-group" id="company-logo-group">
                <label for="company-logo">Image</label>
                <input type="file" id="logo" name="logo">
              </div>
            </div>
          </div>
        </div> 
        <div class="row text-center">
        <p>&nbsp;</p>
       <button type="submit" name="" class="btn btn-primary">Post Job</button>
      </div>
    </form>
  </div>
      <!-- /.row -->
    </section>

  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.3
    </div>
    <strong>Copyright &copy; 2016 <a href="#">Job Portal</a>.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<script type="text/javascript" src="../js/jquery.datepick.js"></script>
<script type="text/javascript">

var ajaxGetSubCat = function(catid){

  $('#subcatselect').html('<option value="">Select</option>');

  $.ajax({
    type:'GET',
    url:'http://192.168.1.158/jobportal/public/getsubcatbyid/'+catid,
    success:function(result){
      console.log(result);
      $(result).each(function(){
        $('#subcatselect').append('<option>'+$(this).prop('sub_category_title')+'</option>');
      });
    }
  });

}

$(function() {
    $('#job_start_date').datepick({
    dateFormat: 'dd-mm-yyyy',
  yearRange: '1940:<?php echo date("Y"); ?>',
       onSelect: function() {
            $("#job_start_date").removeClass("error");
            $("label[for=job_start_date]").remove();
       }
    });  
    $('#job_end_date').datepick({
    dateFormat: 'dd-mm-yyyy',
  yearRange: '1940:<?php echo date("Y"); ?>',
       onSelect: function() {
            $("#job_end_date").removeClass("error");
            $("label[for=job_end_date]").remove();
       }
    });  
});
function showDate(date) {
  alert('The date chosen is ' + date);
}
</script>


<!-- jQuery 2.2.0 -->
<script src="../../plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="../../plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="../../plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>

<!-- <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script> -->

</body>
</html>
