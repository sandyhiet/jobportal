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
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

  <link href="css/style.css" rel="stylesheet">




  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>




  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->


  <!-- <script src="../ckeditor.js"></script>
  <script src="js/sample.js"></script>
  <link rel="stylesheet" href="css/samples.css">
  <link rel="stylesheet" href="toolbarconfigurator/lib/codemirror/neo.css"> -->

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




@include('jobseeker/jobseekerleftsidebar')







  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="margin-left:18px;">
        Dashboard
      
      </h1>
    </section>


<!-- ============ RESUME START ============ -->
<?php

///print_r($resume_post);

 ?>


    <section id="resume">
      <div class="container" >

      <!-- <form onsubmit="return jobseeker_resume_update('#jobseeker_resume_update', '#jobseeker_resume', 'jobseeker_resume_update')" action="{{url('jobseeker_resume_update')}}" method="POST" autocomplete="off" id="jobseeker_resume_update" enctype="multipart/form-data"> -->
       <form name="form" method="post" action="{{url('jobseeker_resume_update')}}" enctype="multipart/form-data" id="register_form">
              <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                 <input type="hidden" value="{{ $resume_post[0]->id }}" name="jobseeker_id">

          <!-- Resume Details Start -->
          <div class="row">
            <div class="col-sm-6">
              <h2>Resume details</h2>
            </div>
           <!--  <div class="col-sm-6 text-right">
              <a class="btn btn-primary"><i class="fa fa-linkedin-square"></i> LinkedIn Import</a>
            </div> -->
          </div>
      <!--  <div id="recr_reg_fname_formgroup" class="form-group">
            <label for="register-name">First Name</label>
                      <input type="text" class="form-control"  id="firstname" name="firstname">
                      <span id="recr_reg_fname_helpblock" class="help-block"></span>
          </div> -->


          <div class="row">
            <div class="col-sm-6">
              <div class="form-group" id="resume_fname_group">
                <label for="resume-name">First Name</label>

                <input name="firstname" type="text" class="form-control" id="firstname" value="{{$resume_post[0]->firstname}}">
                <span id="resume_fname_group_block" class="help-block"></span> 
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group" id="resume-name-group">
                <label for="resume-name">Last Name</label>

                <input name="lastname" type="text" class="form-control" id="resume-name" value="{{$resume_post[0]->lastname}}"> 
              </div>
            </div>

            
            <div class="col-sm-6">
              <div class="form-group" id="resume-photo-group">
                <label for="resume-photo">Photo (Optional)</label>
                <input type="file" name="jobseeker_image" id="jobseeker_image" class="form-control" value="">
                      <!-- <input type="hidden" name="Presilderimage" id="resume-photo" value="{{$resume_post[0]->file}}"> -->
         
              </div>
            </div>
             <div class="col-sm-6">
              <div class="form-group" id="resume-skills-group">
                <label for="resume-skills">Skills</label>
                <input name="skill" type="text" class="form-control" id="skill" value="{{$resume_post[0]->skill}}">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">
              <div class="form-group" id="resume-title-group">
                <label for="resume-title">Title</label>
                <input name="title" type="text" class="form-control" id="resume-title" value="{{$resume_post[0]->title}}">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group" id="resume-video-group">
                <label for="resume-video">Video (Optional)</label>
                <input name="video" type="text" class="form-control" id="resume-video" value="{{$resume_post[0]->video}}">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">
              <div class="form-group" id="resume-location-group">
                <label for="resume-location">country</label>
                <select type="text" name="country" class="countries" id="country" class="form-control">
                <option name="country" value="{{$resume_post[0]->country}}">{{$resume_post[0]->country}}</option>
                </select>
               </div>
            </div>
            
            <div class="col-sm-6">
              <div class="form-group" id="resume-location-group">
                <label for="resume-location">state</label>
                <select type="text" name="state" class="states" id="state" class="form-control" >
                 <option class="form-control" type="text" name="state" value="{{$resume_post[0]->state}}">{{$resume_post[0]->state}}</option>
                </select>
                
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group" id="resume-location-group">
                <label for="resume-location">city</label>
                <select name="city" class="cities" id="city" class="form-control" >
                  <option name="city" value="{{$resume_post[0]->city}}">{{$resume_post[0]->city}}</option>
                </select>
                
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group" id="resume-category-group">
                <label for="resume-category">Job Category</label>
                <select name="job_category"  class="form-control" id="resume-category" value="{{$resume_post[0]->job_category}}">
                  <option value="">Choose a category</option>
+                  <option value="Internet Services">Internet Services</option>
                   <option value="Banking">Banking</option>
                   <option value="Financial">Financial</option>
                   <option value="Marketing">Marketing</option>
                   <option value="Management">Management</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group" id="resume-content-group">
             
                <label for="resume-content">Resume Content</label>
              <div id="sample">
                <textarea name="resume_content" style="width: 950px; height: 250px;" class="textarea">
                       {{$resume_post[0]->resume_content}}
                </textarea>
                </div>

                <!-- <div >
                  <textarea  name="resume_content" class="textarea form-control" style="height:205px;"></textarea>
                </div> -->
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <hr class="dashed">
            </div>
          </div>
          <div class="row social-network">
            <div class="col-sm-6">
              <div id="itemRows">

              <div class="form-group" id="resume-social-network-group">
                <label for="resume-social-network"></label>
                <select name="choose_network"  class="form-control" id="resume-social-network" value="{{$resume_post[0]->choose_network}}">
                  <option value="">Choose social network</option>
                  <option value="Facebook">Facebook</option>
                  <option value="Twitter">Twitter</option>
                  <option value="Google+">Google+</option>
                  <option value="LinkedIn">LinkedIn</option>
                  <option value="YouTube">YouTube</option>
                  <option value="Vimeo">Vimeo</option>
                  <option value="Github">Github</option>
                  <option value="Flickr">Flickr</option>
                  <option value="DeviantArt">DeviantArt</option>
                  <option value="ThemeForest">ThemeForest</option>
                  <option value="CodeCanyon">CodeCanyon</option>
                  <option value="VideoHive">VideoHive</option>
                  <option value="AudioJungle">AudioJungle</option>
                  <option value="GraphicRiver">GraphicRiver</option>
                  <option value="PhotoDune">PhotoDune</option>
                  <option value="3dOcean">3dOcean</option>
                  <option value="ActiveDen" >ActiveDen</option>
                  <option value="Other">Other</option>
                </select>
              </div>
              </div>
              </div>
           
            <div class="col-sm-6">
                <div id="itemRows">

              <div class="form-group" id="resume-social-network-url-group">
              
                <label for="resume-social-network-url">URL</label>
                <input name="url" type="text" class="form-control" value="{{$resume_post[0]->url}}">

              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <hr class="dashed">
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <p>
             <input onclick="addRow(this.form);" type="button" value="Add row" />
<!--              <a id='addButton'>+ Add Social Network</a>
 -->              </p>
              <hr>
            </div>
          </div>
          <!-- Resume Details End -->
<script type="text/javascript">
  
var rowNum = 0;
function addRow(frm) {
rowNum ++;
var row = '<p id="rowNum'+rowNum+'">Item quantity: <input class="form-control" type="text" name="qty[]" value="'+frm.choose_network.value+'"> Item name: <input class="form-control" type="text" name="name[]" value="'+frm.url.value+'"> <input type="button" value="Remove" onclick="removeRow('+rowNum+');"></p>';
jQuery('#itemRows').append(row);
frm.choose_network.value = '';
frm.url.value = '';
}

function removeRow(rnum) {
jQuery('#rowNum'+rnum).remove();
}

</script>
          <!-- Experience Start -->
          <div class="row">
            <div class="col-sm-12">
              <p>&nbsp;</p>
              <h2>Experience</h2>
            </div>
          </div>
          <div class="row experience">
            <div class="col-sm-6">
              <div class="form-group" id="resume-employer-group">
                <label for="resume-employer">Employer</label>
                <input name="employer" type="text" class="form-control" id="employer" value="{{$resume_post[0]->employer}}">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group" id="resume-experience-dates-group">
                <label for="resume-experience-dates">Start/End Date</label>
            <table border="0" cellpadding="0" cellspacing="0">
            <tr><td>From:-</td><td>
                    <input class="form-control" type="date" name="date"  value="{{$resume_post[0]->date}}"/>
            </td><td>&nbsp;&nbsp;&nbsp;</td><td>To:-</td><td>
                    <input class="form-control" type="date" name="end_date" value="{{$resume_post[0]->end_date}}"/>
            </td></tr>
            </table>
<!--                 <input name="date" type="date" class="form-control" id="resume-experience-dates" value="{{$resume_post[0]->date}}">
 -->              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group" id="resume-job-title-group">
                <label for="resume-job-title">Job Title</label>
                <input name="job_title" type="text" class="form-control" id="resume-job-title" value="{{$resume_post[0]->job_title}}">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group" id="resume-responsibilities-group">
                <label for="resume-responsibilities">Responsibilities (Optional)</label>
                <input name="responsibilities" type="text" class="form-control" id="resume-responsibilities" value="{{$resume_post[0]->responsibilities}}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <hr class="dashed">
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <p><a id="add-experience">+ Add Experience</a></p>
              <hr>
            </div>
          </div>
          <!-- Experience Start -->

          <!-- Education Start -->
          <div class="row">
            <div class="col-sm-12">
              <p>&nbsp;</p>
              <h2>Education</h2>
            </div>
          </div>
          <div class="row education">
            <div class="col-sm-6">
              <div class="form-group" id="resume-school-group">
                <label for="resume-school">School Name</label>
                <input name="school_name" type="text" class="form-control" id="school_name" value="{{$resume_post[0]->school_name}}">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group" id="resume-education-dates-group">
                <label for="resume-education-dates">Start/End Date</label>
            <table border="0" cellpadding="0" cellspacing="0">
            <tr><td>From:-</td><td>
                    <input class="form-control" type="date" name="s_date"  value="{{$resume_post[0]->s_date}}"/>
            </td><td>&nbsp;&nbsp;&nbsp;</td><td>To:-</td><td>
                    <input class="form-control" type="date" name="e_date" value="{{$resume_post[0]->e_date}}"/>
            </td></tr>
            </table>


              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group" id="resume-qualifications-group">
                <label for="resume-qualifications">Qualifications</label>
                <input name="qualification" type="text" class="form-control" id="resume-qualifications" value="{{$resume_post[0]->qualification}}">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group" id="resume-notes-group">
                <label for="resume-notes">Notes (Optional)</label>
                <input name="notes" type="text" class="form-control" id="resume-notes" placeholder="Any achievements" value="{{$resume_post[0]->notes}}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <hr class="dashed">
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <p><a id="add-education">+ Add Education</a></p>
              <hr>
            </div>
          </div>
          <!-- Education Start -->

          <!-- Resume File Start -->
          <div class="row">
            <div class="col-sm-12">
              <p>&nbsp;</p>
              <h2>Resume File</h2>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group" id="resume-file-group">
                <label for="resume-file">Upload Your Resume (Optional)</label>
                <input name="update_resume" type="file" id="update_resume" value="{{$resume_post[0]->update_resume}}" >
                <p class="help-block">Optionally upload your resume for employers to view. Max. file size: 64 MB.</p>
              </div>
            </div>
          </div>
          <!-- Resume File Start -->

          <div class="row text-center">
            <div class="col-sm-12">
              <p>&nbsp;</p>
              <button type="submit" id="jobseeker_resume" class="btn btn-primary" style="width: 112px;">Submit</button> 
            </div>
          </div>


        </form>

      </div>
    </section>
    <?php
    //$i++;
    //}

    ?>      

    <!-- ============ RESUME END ============ -->









     </div></div>
    <!-- jQuery 2.2.0 -->
<script src="{{url('plugins/jQuery/jQuery-2.2.0.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{url('bootstrap/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{url('plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('dist/js/app.min.js')}}"></script>

<script src="../../js/app.js"></script>

<!-- Sparkline -->
<script src="{{url('plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="../../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="../../plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- country state -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://iamrohit.in/lab/js/location.js"></script>


<!-- editor used **********************************************************  -->

<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
   <script type="text/javascript">
//<![CDATA[
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  //]]>
  </script>



<!-- editor used **********************************************************  -->



<!-- sdfs -->

<!-- datepiccker -->

</body></html>
<style type="text/css">
#sample{
  background-color: white;
}
  .container {
   width: 976px;
  }
</style>
<script>
  
  // When the browser is ready...
  $(function() {
  
    // Setup form validation on the #register-form element
    $("#register_form").validate({
    
        // Specify the validation rules
        rules: {
            firstname: "required",
            lastname: "required",
            jobseeker_image:"required",
            employer:"required",
            update_resume:"required",
            school_name:"required",
            country:"required",
            state:"required",
            city:"required"
            
        },
        
        // Specify the validation error messages
        messages: {
            firstname: "<font color='red'>Please enter your firstname</font>",
            lastname: "<font color='red'>Please enter your lastname</font>",
            jobseeker_image: "<font color='red'>Please select your image</font>",
            employer: "<font color='red'>Please select Employer Name</font>",
            update_resume: "<font color='red'>Please select your resume file</font>",
            school_name: "<font color='red'>Please select your School Nmae</font>",
            country: "<font color='red'>Please select your Country</font>",
            state: "<font color='red'>Please select your State</font>",
            city: "<font color='red'>Please select your City</font>",




            
            agree: "Please accept our policy"
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  
  </script>



<html>
<head>
  
 
  
  <link href="runnable.css" rel="stylesheet" />
  <!-- Load jQuery and the validate plugin -->
  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
  
  <!-- jQuery Form Validation code -->
 </head>
</html>







<style type="text/css">
  
  * {
  .border-radius(0) !important;
}

#field {
    margin-bottom:20px;
}
</style>














