<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Camel Foundation</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- Full Calender CSS -->
    <link href="css/fullcalendar.css" rel="stylesheet">
    <!-- Bx-Slider StyleSheet CSS -->
    <link href="css/jquery.bxslider.css" rel="stylesheet">
    <!-- Owl Carousel StyleSheet CSS -->
    <link href="css/owl.carousel.css" rel="stylesheet"> 
    <!-- Font Awesome StyleSheet CSS -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
	<!-- Pretty Photo CSS -->
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <!-- SVG Icon StyleSheet CSS -->
    <link href="svg-icon/svg-style.css" rel="stylesheet">
    <!-- Widget CSS -->
    <link href="css/widget.css" rel="stylesheet">
    <!-- Typography CSS -->
    <link href="css/typography.css" rel="stylesheet">
	<!-- Time Circles CSS -->
	<link href="css/TimeCircles.css" rel="stylesheet">
    <!-- Shortcodes CSS -->
    <link href="css/shortcodes.css" rel="stylesheet">
	<!-- DL Menu CSS -->
	<link href="js/dl-menu/component.css" rel="stylesheet">
	<!-- Custom Main StyleSheet CSS -->
    <link href="style.css" rel="stylesheet">
    <!-- Color CSS -->
    <link href="css/color.css" rel="stylesheet">
    <!-- Responsive CSS -->
    <link href="css/responsive.css" rel="stylesheet">


    <script type="text/javascript">


    function validateEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
    }

   

    function validation(){

        var nm=document.getElementById("name").value;
        if(nm == '')
        {

            document.getElementById("reqName").style.display='block';
            document.getElementById("name").focus();
        return false;
        }
        else{
            document.getElementById("reqName").style.display='none';
        }

        var em=document.getElementById("email").value;
        if(em == '' || em == 'null')
        {

            document.getElementById("reqEmail").style.display='block';
            document.getElementById("email").focus();
        return false;
        }
        if(!validateEmail(em)){
        document.getElementById("reqEmail").style.display='none'; 
        document.getElementById("reqEmailvalid").style.display='block';
        //alert("Please enter valid Email");
        $('#email').val('');
        document.getElementById("email").focus();
        return false;
        }
        else{
            document.getElementById("reqEmail").style.display='none';
            document.getElementById("reqEmailvalid").style.display='none';
        }

        var ph=document.getElementById("phone").value;
        if(ph == '')
        {

            document.getElementById("reqPhone").style.display='block';
            document.getElementById("phone").focus();
        return false;
        }
        else{
            document.getElementById("reqPhone").style.display='none';
        }

        var sub=document.getElementById("subject").value;
        if(sub == '')
        {

            document.getElementById("reqSubject").style.display='block';
            document.getElementById("subject").focus();
        return false;
        }
        else{
            document.getElementById("reqSubject").style.display='none';
        }

         return true;

    }
   



    </script>
 
  </head>

  <body>

<!--Kode Wrapper Start-->  
<div class="kode_wrapper">
	
    <!--Header Wrap Start-->
    @include('header')
    <!--Header Wrap Start-->
    
    
    <!--Bread Crumb Wrap Start-->
    <div class="kode_about_bg">
    	<div class="container">
        	<div class="kode_aboutus_wrap">
            	<h4>Contact us</h4>
                <div class="kode_bread_crumb">
                	<ul>
                		<li><a href="{{url('/')}}">Home</a></li>
                    	<li><a href="{{url('contact_us')}}">Contact Us</a></li>
                	</ul>
                </div>
            </div>
        </div>
    </div>
    <!--Bread Crumb Wrap Start-->
    
    
    
    <!--Content Wrap Start-->
    <div class="kode_content">
    
    	<!--Contact Us Wrap Start-->
        <div class="kf_contactus">
        	<div class="kf_contact_map">
            	<div class="map-canvas" id="map-canvas"></div>
            </div>
            
            <!--Office Location Info Wrap Start-->
            <div class="kf_location_wrap">
            	<ul class="kf_office_name" id="tabs" data-tabs="tabs">
                	<li class="active"><a data-toggle="tab" href="#office1">USA Office</a></li>
                    <li><a data-toggle="tab" href="#office2">UK Office</a></li>
                </ul>
                
                <div class="row tab-content" id="my-tab-content">
                	<div class="tab-pane active" id="office1">
                        <div class="col-md-4 col-sm-4">
                            <div class="kf_location_info">
                                <i class="fa fa-map-marker"></i>
                                <h6>Location</h6>
                                <p>{{ $contact_usa[0]->Location}}</p>
                                <span>USA</span>
                            </div>
                        </div>
                    
                        <div class="col-md-4 col-sm-4">
                            <div class="kf_location_info">
                                <i class="fa fa-phone"></i>
                                <h6>Phone Number</h6>
                                <p>{{ $contact_usa[0]->PhoneNumber1}}</p>
                                <span>{{ $contact_usa[0]->PhoneNumber2}}</span>
                            </div>
                        </div>
                    
                        <div class="col-md-4 col-sm-4">
                            <div class="kf_location_info">
                                <i class="fa fa-send"></i>
                                <h6>Email address</h6>
                                <a href="#">{{ $contact_usa[0]->Email}}</a>
                                <ul class="kf_loc_socil_icon">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="tab-pane" id="office2">
                        <div class="col-md-4 col-sm-4">
                            <div class="kf_location_info">
                                <i class="fa fa-phone"></i>
                                <h6>Phone Number</h6>
                                <p>{{ $contact_uk[0]->PhoneNumber1}}</p>
                                <span>{{ $contact_uk[0]->PhoneNumber2}}</span>
                            </div>
                        </div>
                    
                        <div class="col-md-4 col-sm-4">
                            <div class="kf_location_info">
                                <i class="fa fa-send"></i>
                                <h6>Email address</h6>
                                <a href="#">{{ $contact_uk[0]->Email}}</a>
                                <ul class="kf_loc_socil_icon">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    
                        <div class="col-md-4 col-sm-4">
                            <div class="kf_location_info">
                                <i class="fa fa-map-marker"></i>
                                <h6>Location</h6>
                                <p>{{ $contact_uk[0]->Location}}</p>
                                <span></span>
                            </div>
                        </div>
                    </div>


                    
                </div>
                
            </div>
            <!--Office Location Info Wrap Start-->
            
        </div>
        <!--Contact Us Wrap End-->
        
        <!--Get in Touch Form Wrap Start-->
        <section>
        	<div class="container">
            	<div class="kode_hdg_1">
                	<h6>What Going On</h6>
                    <h4>Get in Touch with Us</h4>
                </div>
             
                    <div class="row">
                        <div class="col-md-9">
                             @include('layout.error-notification')
                             {!! Form::open(array('url'=>'saveFeedback','method'=>'post','onsubmit'=>'return validation();')) !!}
                        	
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="kf_touch_field">
                                            <div id="reqName" style="color:red; font-size:10px; display:none" class="help-block">Required</div>
                                        	<input class="comming_place" type="text" id="name" name="name" placeholder="Your Name:">
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 col-sm-6">
                                        <div class="kf_touch_field">
                                            <div id="reqEmail" style="color:red; font-size:10px; display:none" class="help-block">Required</div>
                                            <div id="reqEmailvalid" style="color:red; font-size:10px; display:none" class="help-block">Please Enter Valid Email Id</div>
                                        	<input class="comming_place" id="email" name="email" type="text" placeholder="Email Address:">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 col-sm-6">
                                        <div class="kf_touch_field">
                                            <div id="reqPhone" style="color:red; font-size:10px; display:none" class="help-block">Required</div>
                                        	<input class="comming_place" type="text" id="phone" name="phone" placeholder="Phone Number:">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 col-sm-6">
                                        <div class="kf_touch_field">
                                            <div id="reqSubject" style="color:red; font-size:10px; display:none" class="help-block">Required</div>
                                        	<input class="comming_place" type="text" id="subject" name="subject" placeholder="subject:">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="kf_touch_field">
                                        	<textarea placeholder="Message" name="feedback" class="comming_place"> </textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="kf_touch_field">
                                        	<button class="kode_btn_1">Send Messages</button>
                                        </div>
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                        
                        <div class="col-md-3">
                        	<div class="kf_touch_img">
                            	<img src="extra-images/get-touch-01.png" alt="Image Here">
                            </div>
                        </div>
                        
                    </div>
                
            </div>
        </section>
        <!--Get in Touch Form Wrap End-->
        
        
    </div>
    <!--Content Wrap End-->
    
    
    <!--Footer Wrap Start-->
    @include('footer')
    <!--Footer Wrap End-->
    
    
        
</div>
<!--Kode Wrapper End-->



    <!--Bootstrap core JavaScript-->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <!--Bx-Slider JavaScript-->
	<script src="js/jquery.bxslider.min.js"></script>
    <!--Time Counter JavaScript-->
	<script src="js/jquery.downCount.js"></script>
    <!--Owl Carousel JavaScript-->
	<script src="js/owl.carousel.min.js"></script>
    <!--waypoints JavaScript-->
	<script src="js/waypoints-min.js"></script>
    <!--Pie Circle JavaScript-->
	<script src="js/pie.js"></script>
    <!--Accordian JavaScript-->
	<script src="js/jquery.accordion.js"></script>
    <!--Custom TimeCircle-->
    <script src="js/TimeCircles.js"></script>
	<!--Pretty Photo Script-->
    <script src="js/jquery.prettyPhoto.js"></script>
	<!--Pretty Photo Script-->
    <script src="js/jquery-filterable.js"></script>
	<!--Dl Menu Script-->
	<script src="js/dl-menu/modernizr.custom.js"></script>
	<!--Dl Menu Script-->
	<script src="js/dl-menu/jquery.dlmenu.js"></script>
	<!--Map Script-->
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<!--Full Calender Script-->
	<script src="js/moment.min.js"></script>
    <script src="js/fullcalendar.min.js"></script>
	<!--Custom JavaScript-->
	<script src="js/custom.js"></script>

  </body>
</html>
