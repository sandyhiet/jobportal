<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Recruiter Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <!--  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->

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

  <link href="css/style.css" rel="stylesheet">
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

    <section id="resume">
    
               
    <div class="box-body pad">
      <div class="container" >
        <form  name="form" method="POST" action="{{url('save_resume')}}" role="form" enctype="multipart/form-data">
             <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

          <!-- Resume Details Start -->
          <div class="row">
            <div class="col-sm-6">
              <h2>Profile</h2>
            </div>
            <!-- <div class="col-sm-6 text-right">
              <a class="btn btn-primary"><i class="fa fa-linkedin-square"></i> LinkedIn Import</a>
            </div> -->
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group" id="resume-name-group">
                <label for="resume-name">Name</label>
                <input name="name" type="text" class="form-control" id="resume-name">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group" id="resume-photo-group">
                <label for="resume-photo">Photo (Optional)</label>
                <input name="jobseeker_image" type="file" id="resume-photo">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group" id="resume-title-group">
                <label for="resume-title">Title</label>
                <input name="title" type="text" class="form-control" id="resume-title" >
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group" id="resume-video-group">
                <label for="resume-video">Video (Optional)</label>
                <input name="video" type="text" class="form-control" id="resume-video" >
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group" id="resume-email-group">
                <label for="resume-email">Email</label>
                <input name="email" type="email" class="form-control" id="resume-email" >
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group" id="resume-category-group">
                <label for="resume-category">Job Category</label>
                <select name="job_category"  class="form-control" id="resume-category">
                  <option>Choose a category</option>
                  <option>Internet Services</option>
                  <option>Banking</option>
                  <option>Financial</option>
                  <option>Marketing</option>
                  <option>Management</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group" id="resume-location-group">
                <label for="resume-location">country</label>
                <input name="country" type="text" class="form-control" id="resume-location">
              </div>
            </div>
             <div class="col-sm-6">
              <div class="form-group" id="resume-skills-group">
                <label for="resume-skills">Skills</label>
                <input name="skill" type="text" class="form-control" id="resume-skills">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group" id="resume-location-group">
                <label for="resume-location">state</label>
                <input name="state" type="text" class="form-control" id="resume-location">
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group" id="resume-location-group">
                <label for="resume-location">city</label>
                <input name="city" type="text" class="form-control" id="resume-location">
              </div>
            </div>
            
          </div>
          <div class="row">
           <div class="col-sm-12">
            <div class="box-body pad">
             <label for="resume-location">Content</label>
             <textarea name="resume_content" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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
              <div class="form-group" id="resume-social-network-group">
                <label for="resume-social-network">Choose Social Network</label>
                <select name="choose_network"  class="form-control" id="resume-social-network">
                  <option>Choose social network</option>
                  <option>Facebook</option>
                  <option>Twitter</option>
                  <option>Google+</option>
                  <option>LinkedIn</option>
                  <option>YouTube</option>
                  <option>Vimeo</option>
                  <option>Github</option>
                  <option>Flickr</option>
                  <option>YouTube</option>
                  <option>DeviantArt</option>
                  <option>ThemeForest</option>
                  <option>CodeCanyon</option>
                  <option>VideoHive</option>
                  <option>AudioJungle</option>
                  <option>GraphicRiver</option>
                  <option>PhotoDune</option>
                  <option>3dOcean</option>
                  <option>ActiveDen</option>
                  <option>Other</option>
                </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group" id="resume-social-network-url-group">
                <label for="resume-social-network-url">URL</label>
                <input name="url" type="text" class="form-control" id="resume-social-network-url">
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
              <p><a id="add-social-network">+ Add Social Network</a></p>
              <hr>
            </div>
          </div>
          <!-- Resume Details End -->

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
                <input name="employer" type="text" class="form-control" id="resume-employer">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group" id="resume-experience-dates-group">
                <label for="resume-experience-dates">Start/End Date</label>
                <input name="date" type="date" class="form-control" id="resume-experience-dates" >
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group" id="resume-job-title-group">
                <label for="resume-job-title">Job Title</label>
                <input name="job_title" type="text" class="form-control" id="resume-job-title">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group" id="resume-responsibilities-group">
                <label for="resume-responsibilities">Responsibilities (Optional)</label>
                <input name="responsibilities" type="text" class="form-control" id="resume-responsibilities" >
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
                <input name="school_name" type="text" class="form-control" id="resume-school" >
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group" id="resume-education-dates-group">
                <label for="resume-education-dates">Start/End Date</label>
                <input name="s_date" type="date" class="form-control" id="resume-education-dates" >
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group" id="resume-qualifications-group">
                <label for="resume-qualifications">Qualifications</label>
                <input name="qualification" type="text" class="form-control" id="resume-qualifications" >
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group" id="resume-notes-group">
                <label for="resume-notes">Notes (Optional)</label>
                <input name="notes" type="text" class="form-control" id="resume-notes" placeholder="Any achievements">
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
                <input name="update_resume" type="file" id="resume-file">
                <p class="help-block">Optionally upload your resume for employers to view. Max. file size: 64 MB.</p>
              </div>
            </div>
          </div>
          <!-- Resume File Start -->

          <div class="row text-center">
            <div class="col-sm-12">
              <p>&nbsp;</p>
              <button type="submit" name="" class="btn btn-primary">Submit</button> </div>
          </div>


        </form>

      </div>
      </div>
    </section>

    <!-- ============ RESUME END ============ -->

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
<script>
document.getElementById('make-bold').addEventListener('click', function(event){
    event.preventDefault();

    var selection = window.getSelection();
    var range = selection.getRangeAt(0).cloneRange();
    var tag = document.createElement('strong');

    range.surroundContents(tag);
    selection.addRange(range);
});
</script>
</body>
</html>
