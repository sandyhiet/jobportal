<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Recruiter Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

   
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
             <!-- @include('layout.error-notification') -->
            <!-- <form  name="form" method="POST" action="{{url('saveJobs')}}"> -->
              <form onsubmit="return saveJobs('#saveJobs', '#saveJobsSubmitBtn', 'saveJobs');" id="saveJobs" action="{{url('saveJobs')}}" method="post" autocomplete="off">
             <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
              <div class="box-body">
               <div id="recr_category_group" class="form-group {{ $errors->has('category_id') ? ' has-error' : '' }}">
                <label for="job-category">Category</label>
                <select onchange="ajaxGetSubCat(this.value)" class="form-control" id="category_id" name="category_id">
                  <option value="">Select category</option>
                  <?php
                  $category = DB::table('tbl_category')->get();
                 foreach ($category as $key => $value) {
                   ?>
                  <option value="{{$category[$key]->category_name}}">{{$category[$key]->category_name}}</option>
                  <?php }?>
                </select>
                 <span id="recr_category_helpblock" class="help-block"></span>
                  @if ($errors->has('category_id'))
                  <span class="help-block">
                   <strong>{{ $errors->first('category_id') }}</strong>
                  </span>
                  @endif
              </div>

               <div id="recr_subcategory_group"  class="form-group {{ $errors->has('sub_category_id') ? ' has-error' : '' }}">
                <label for="job-type">Sub Category</label>
                <select  class="form-control" id="subcatselect" name="sub_category_id">
                  <option>Select Subcategory</option>
                </select>
                <span id="recr_subcategory_helpblock" class="help-block"></span>
                 @if ($errors->has('sub_category_id'))
                  <span class="help-block">
                   <strong>{{ $errors->first('sub_category_id') }}</strong>
                  </span>
                  @endif
              </div>
                <div id="recr_title_group"  class="form-group {{ $errors->has('jobTitle') ? ' has-error' : '' }}">
                  <label for="job-title">Title</label>
                  <input type="text" class="form-control" id="jobTitle"  name="jobTitle">
                  <span id="recr_title_helpblock" class="help-block"></span>
                  @if ($errors->has('jobTitle'))
                  <span class="help-block">
                   <strong>{{ $errors->first('jobTitle') }}</strong>
                  </span>
                  @endif
              </div>

              <div id="recr_country_group" class="form-group {{ $errors->has('country') ? ' has-error' : '' }}">
                <label for="job-location">Country</label>
                <select onchange="ajaxGetstate(this.value)" class="form-control" id="country" placeholder="" name="country">
                  <option>Select</option>
                   <?php
                    $countries = DB::table('tbl_country')->select('*')->get();
                    foreach($countries as $key=>$val){
                    ?>
                    <option value="{{$countries[$key]->country_name}}">{{$countries[$key]->country_name}}</option>
                   <?php }?>
                 </select> 
                 <span id="recr_country_helpblock" class="help-block"></span>
                  @if ($errors->has('country'))
                  <span class="help-block">
                   <strong>{{ $errors->first('country') }}</strong>
                  </span>
                  @endif
              </div>

              <div id="recr_state_group" class="form-group {{ $errors->has('state') ? ' has-error' : '' }}">
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
                <span id="recr_state_helpblock" class="help-block"></span>
                 @if ($errors->has('state'))
                  <span class="help-block">
                   <strong>{{ $errors->first('state') }}</strong>
                  </span>
                @endif
              </div>
               <div id="recr_city_group" class="form-group {{ $errors->has('city') ? ' has-error' : '' }}">
                <label for="job-region">City</label>
                <select  class="form-control" id="city" placeholder="" name="city">
                  <option>Select</option>
                </select>
                <span id="recr_city_helpblock" class="help-block"></span>
                 @if ($errors->has('city'))
                  <span class="help-block">
                   <strong>{{ $errors->first('city') }}</strong>
                  </span>
                  @endif
              </div>
              <div id="recr_req_group" class="form-group {{ $errors->has('requirements') ? ' has-error' : '' }}">
                <label for="">Requirements</label>
                <input type="text" class="form-control" id="requirements" placeholder="" name="requirements">
                <span id="recr_req_helpblock" class="help-block"></span>
                 @if ($errors->has('requirements'))
                  <span class="help-block">
                   <strong>{{ $errors->first('requirements') }}</strong>
                  </span>
                  @endif
              <div id="recr_exp_group"  class="form-group {{ $errors->has('experiance') ? ' has-error' : '' }}">
                <label for="">Experiance</label>
                <input type="text" class="form-control" id="experiance" placeholder="" name="experiance">
                <span id="recr_exp_helpblock" class="help-block"></span>
                 @if ($errors->has('experiance'))
                  <span class="help-block">
                   <strong>{{ $errors->first('experiance') }}</strong>
                  </span>
                  @endif
             </div>
             <div  id="recr_sal_group" class="form-group {{ $errors->has('salary_budget') ? ' has-error' : '' }}">
                <label for="">Salary Budget</label>
                <input type="text" class="form-control" id="salary_budget" placeholder="" name="salary_budget">
                 <span id="recr_sal_helpblock" class="help-block"></span>
                  @if ($errors->has('salary_budget'))
                  <span class="help-block">
                   <strong>{{ $errors->first('salary_budget') }}</strong>
                  </span>
                  @endif
             </div>
              <div  id="recr_skill_group" class="form-group {{ $errors->has('keySkill') ? ' has-error' : '' }}" >
                <label for="">Key Skill</label>
                 <select  class="form-control" id="keySkill" placeholder="" name="keySkill">
                  <option>Select</option>
                  <?php
                    $keyskills = DB::table('keyskills')->select('*')->get();
                    foreach($keyskills as $key=>$val){
                    ?>
                    <option value="{{$keyskills[$key]->Keyskill_name}}">{{$keyskills[$key]->Keyskill_name}}</option>
                    <?php }?>
                </select>
                <span id="recr_skill_helpblock" class="help-block"></span>
                 @if ($errors->has('keySkill'))
                  <span class="help-block">
                   <strong>{{ $errors->first('keySkill') }}</strong>
                  </span>
                  @endif
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
                <div  class="form-group {{ $errors->has('companyName') ? ' has-error' : '' }}" id="recr_cname_group">
                <label for="company-name">Company Name</label>
                <input type="text" class="form-control" id="companyName" placeholder="" name="companyName">
                <span id="recr_cname_helpblock" class="help-block"></span>
                @if ($errors->has('companyName'))
                <span class="help-block">
                 <strong>{{ $errors->first('companyName') }}</strong>
                </span>
                @endif
              </div>
               <div  id="recr_mob1_group" class="form-group {{ $errors->has('mobileNumber1') ? ' has-error' : '' }}">
                <label for="company-tagline">Mobile1</label>
                <input type="text" id="mobileNumber1" class="form-control" name="mobileNumber1">
                <span id="recr_mob1_helpblock" class="help-block"></span>
                 @if ($errors->has('mobileNumber1'))
                  <span class="help-block">
                   <strong>{{ $errors->first('mobileNumber1') }}</strong>
                  </span>
                  @endif
              </div>
              <div  id="recr_mob2_group" class="form-group">
                <label>Mobile2</label>
                  <input type="text" id="mobileNumber2" class="form-control" name="mobileNumber2" >
                   <span id="recr_mob2_helpblock" class="help-block"></span>
             </div>
              <div id="recr_desc_group" class="form-group {{ $errors->has('companyDescription') ? ' has-error' : '' }}">
                <label for="company-video">Description</label>
                 <textarea class="form-control" rows="5" placeholder="Enter ..." name="companyDescription" id="companyDescription"></textarea>
                 <span id="recr_desc_helpblock" class="help-block"></span>
                  @if ($errors->has('companyDescription'))
                  <span class="help-block">
                   <strong>{{ $errors->first('companyDescription') }}</strong>
                  </span>
                  @endif
              </div>
              <div id="recr_web_group" class="form-group" >
                <label for="company-website">Website (Optional)</label>
                <input type="text" class="form-control" id="companywebsite" placeholder="http://" name="companywebsite">
                  <span id="recr_web_helpblock" class="help-block"></span>
              </div>
              <div class="form-group" id="recr_industry_group">
                <label for="company-facebook">Industry</label>
                <input type="text" class="form-control" id="industries" placeholder=""  name="industries">
                 <span id="recr_industry_helpblock" class="help-block"></span>
              </div>
              <div class="form-group" id="recr_role_group">
                <label for="">Role</label>


                 <select  class="form-control" id="companyRole" placeholder="" name="companyRole">
                  <option>Select</option>
                  <?php
                    $companyRole = DB::table('role_category')->select('*')->get();
                    foreach($companyRole as $key=>$val){
                    ?>
                    <option value="{{$companyRole[$key]->role_category_name}}">{{$companyRole[$key]->role_category_name}}</option>
                    <?php }?>
                </select>
                <span id="recr_role_helpblock" class="help-block"></span>
              </div>
              <div class="form-group" id="recr_sdate_group">
                <label for="">Starting Date</label>
                <input type="text" class="form-control" id="datepicker" placeholder="" name="job_start_date">
                <span id="recr_sdate_helpblock" class="help-block"></span>
              </div>
              
              <div class="form-group" id="recr_edate_group">
                <label for="">End Date</label>
                <input type="text" class="form-control" id="datepicker" placeholder="" name="job_end_date">
                <span id="recr_edate_helpblock" class="help-block"></span>
              </div>
              <div class="form-group" id="recr_logo_group">
                 <label for="company-logo">Image</label>
                 <input type="file" id="logo" name="logo">
                 <span id="recr_logo_helpblock" class="help-block"></span>
              </div>

<select name="country" class="countries" id="countryId">
<option value="">Select Country</option>
</select>
<select name="state" class="states" id="stateId">
<option value="">Select State</option>
</select>
<select name="city" class="cities" id="cityId">
<option value="">Select City</option>
</select>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://iamrohit.in/lab/js/location.js"></script>


            </div>
          </div>
        </div> 
        <div class="row text-center">
        <p>&nbsp;</p>
       <button id="saveJobsSubmitBtn" type="submit" name="" class="btn btn-primary">Post Job</button>
      </div>
    </form>
  </div>
      <!-- /.row -->
    </section>

  </div>
  <!-- /.content-wrapper -->

  


<footer class="main-footer">
    <div class="pull-right hidden-xs">
     
    </div>
    <strong>Copyright &copy; 2016 <a href="#">Job Portal</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->


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
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  });
</script>

<script type="text/javascript">

var ajaxGetstate = function(catid){

  $('#state').html('<option value="">Select</option>');

  $.ajax({
    type:'GET',
    url:'http://192.168.1.158/jobportal/public/getsubcatbyid/'+catid,
    success:function(result){
      console.log(result);
      $(result).each(function(){
        $('#state').append('<option>'+$(this).prop('state')+'</option>');
      });
    }
  });

}


</script>



  

 <!-- date picker -->

  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css"> 


<!-- jQuery 2.2.0 -->
<script src="../plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="../plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>

<!-- <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script> -->

</body>
</html>



<!--  <?php
$state = DB::table('tbl_state')->select('*')->get();
foreach($state as $key=>$val){
?>
<option value="{{$state[$key]->state_name}}">{{$state[$key]->state_name}}</option>
<?php }?> -->
<!--  <?php
$city = DB::table('tbl_city')->select('*')->get();
foreach($city as $key=>$val){
?>
<option value="{{$city[$key]->city_name}}">{{$city[$key]->city_name}}</option>
<?php }?> -->