var baseurl = $('meta[name="baseurl"]').attr('content');
$(function(){
	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }		
	});
});





// var jobseekerRegistartion = function(formid, submitbtnid, url){
// 	var submitbtnhtml = $(submitbtnid).html();
// 	$(submitbtnid).html('<img src="images/ui-anim_basic_16x16.gif">');
// 	$(submitbtnid).attr('disabled', 'disabled');
	
//     $('#recr_reg_fname_formgroup').removeClass();
// 	$('#recr_reg_fname_helpblock').html('');

// 	$('#recr_reg_lname_formgroup').removeClass();
// 	$('#recr_reg_lname_helpblock').html('');

// 	$('#recr_reg_email_formgroup').removeClass();
// 	$('#recr_reg_email_helpblock').html('');

// 	$('#recr_reg_password_formgroup').removeClass();
// 	$('#recr_reg_password_helpblock').html('');

// 	$('#recr_reg_cpassword_formgroup').removeClass();
// 	$('#recr_reg_cpassword_helpblock').html('');

// 	var data = $(formid).serializeArray();
// 	$.ajax({
// 		type:'post',
// 		data:data,
// 		url:url,
// 		success:function(result){
// 			//alert(result);
			
// 			$(submitbtnid).removeAttr('disabled');
// 			$(submitbtnid).html(submitbtnhtml);
// 			if(result == '1'){
// 				alert('Registra successfully');
// 				location.reload();
// 			} else {
				
// 				if(result.firstname[0]){
// 					$('#recr_reg_fname_formgroup').addClass('has-error');
// 					$('#recr_reg_fname_helpblock').html(result.firstname[0]);
// 				}  
// 				if(result.lastname[0]){
// 					$('#recr_reg_lname_formgroup').addClass('has-error');
// 					$('#recr_reg_lname_helpblock').html(result.lastname[0]);
// 				} 
// 				if(result.email[0]){
// 					$('#recr_reg_email_formgroup').addClass('has-error');
// 					$('#recr_reg_email_helpblock').html(result.email[0]);
// 				}   
// 				if(result.password[0]){
// 					$('#recr_reg_password_formgroup').addClass('has-error');
// 					$('#recr_reg_password_helpblock').html(result.password[0]);
// 				}  

// 				if(result.confirmpassword[0]){
// 					$('#recr_reg_cpassword_formgroup').addClass('has-error');
// 					$('#recr_reg_cpassword_helpblock').html(result.confirmpassword[0]);
// 				}  
// 		  }
// 		}
// 	});
// 	return false;
// }



	

var jobseekerRegistartionForm = function(){
	
	
	$('#contactus_query_frm-firstname').html('').hide();
	$('#contactus_query_frm-lastname').html('').hide();
	$('#contactus_query_frm-email').html('').hide();
	$('#contactus_query_frm-password').html('').hide();

	var prevhtml = $('#jobseeker_reg_submit_btn').html();
	$('#jobseeker_reg_submit_btn').attr('disabled', 'disabled');
	$('#jobseeker_reg_submit_btn').html('<img src="images/ui-anim_basic_16x16.gif">');


	var data = $('#jobseeker_Registartion').serializeArray();
	$.ajax({
		url:baseurl+'/jobseekerRegistartion',
		type:'post',
		data:data,
		success:function(res){
			//alert(res);
			console.log(res);
			$('#jobseeker_reg_submit_btn').removeAttr('disabled');
			$('#jobseeker_reg_submit_btn').html(prevhtml);
			if(res == '1'){
				document.getElementById('jobseeker_Registartion').reset();
				$('#contactus_query_frm-firstname').html('Thank you for your query.').show();
			} else {


				if(res.firstname[0]){
					$('#contactus_query_frm-firstname').html(res.firstname[0]).show();
				} 
				if(res.lastname[0]){
					$('#contactus_query_frm-lastname').html(res.lastname[0]).show();
				} 
				if(res.email[0]){
					$('#contactus_query_frm-email').html(res.email[0]).show();
				}
				if(res.password[0]){
					$('#contactus_query_frm-password').html(res.password[0]).show();
				}

			}
			
		},
		error:function(xhr,status,error){
			alert("Status: " + status);
            alert("Error: " + error);
            alert("xhr: " + xhr.readyState);
            $('#jobseeker_reg_submit_btn').removeAttr('disabled');
			$('#jobseeker_reg_submit_btn').html(prevhtml);
            document.getElementById('jobseeker_Registartion').reset();
		}
	});
	
	return false;
}



var jobseekerlogin = function(formid, submitbtnid, url){
	var submitbtnhtml = $(submitbtnid).html();
	$(submitbtnid).html('<img src="images/ui-anim_basic_16x16.gif">');
	$(submitbtnid).attr('disabled', 'disabled');
	var data = $(formid).serializeArray();
	$.ajax({
		type:'post',
		data:data,
		url:url,
		success:function(result){
			$(submitbtnid).removeAttr('disabled');
			$(submitbtnid).html(submitbtnhtml);
			if(result == 'jobseeker_dashboard'){
				window.location = baseurl+"/jobseeker_dashboard";
			} else {

				if(result.email[0]){
					alert(result.email[0]);
				} 
				if(result.password[0]){
					alert(result.password[0]);
				} 
				
				
			}
		}
	});
	return false;
}



var jobReqRegistration = function(formid, submitbtnid, url){
	var submitbtnhtml = $(submitbtnid).html();
	$(submitbtnid).html('<img src="images/ui-anim_basic_16x16.gif">');
	$(submitbtnid).attr('disabled', 'disabled');
	$('#recr_reg_email_formgroup').removeClass();
	$('#recr_reg_email_helpblock').html('');

	$('#recr_reg_fname_formgroup').removeClass();
	$('#recr_reg_fname_helpblock').html('');

	$('#recr_reg_lname_formgroup').removeClass();
	$('#recr_reg_lname_helpblock').html('');

	$('#recr_reg_password_formgroup').removeClass();
	$('#recr_reg_password_helpblock').html('');

	$('#recr_reg_cpassword_formgroup').removeClass();
	$('#recr_reg_cpassword_helpblock').html('');

	var data = $(formid).serializeArray();
	$.ajax({
		type:'post',
		data:data,
		url:url,
		success:function(result){
			// alert(result);
			
			$(submitbtnid).removeAttr('disabled');
			$(submitbtnid).html(submitbtnhtml);
			if(result == '1'){
				alert('Registra successfully');
				location.reload();
			} else {
				if(result.email[0]){
					$('#recr_reg_email_formgroup').addClass('has-error');
					$('#recr_reg_email_helpblock').html(result.email[0]);
				}  
				if(result.FirstName[0]){
					$('#recr_reg_fname_formgroup').addClass('has-error');
					$('#recr_reg_fname_helpblock').html(result.FirstName[0]);
				}  
				if(result.LastName[0]){
					$('#recr_reg_lname_formgroup').addClass('has-error');
					$('#recr_reg_lname_helpblock').html(result.LastName[0]);
				}  
				if(result.password[0]){
					$('#recr_reg_password_formgroup').addClass('has-error');
					$('#recr_reg_password_helpblock').html(result.password[0]);
				}  

				if(result.confirmpassword[0]){
					$('#recr_reg_cpassword_formgroup').addClass('has-error');
					$('#recr_reg_cpassword_helpblock').html(result.confirmpassword[0]);
				}  
		  }
		}
	});
	return false;
}





var jobrecruiterlogin = function(formid, submitbtnid, url){
	var submitbtnhtml = $(submitbtnid).html();
	$(submitbtnid).html('<img src="images/ui-anim_basic_16x16.gif">');
	$(submitbtnid).attr('disabled', 'disabled');
	var data = $(formid).serializeArray();
	$.ajax({
		type:'post',
		data:data,
		url:url,
		success:function(result){
			$(submitbtnid).removeAttr('disabled');
			$(submitbtnid).html(submitbtnhtml);
			if(result == 'recruiter_dashboard'){
				window.location = baseurl+"/recruiter_dashboard";
			} 

			else {

				if(result.email[0]){
					alert(result.email[0]);
				} 
				if(result.password[0]){
					alert(result.password[0]);
				} 
				
				
			}
		}
	});
	return false;
}



		/*//////////newsletter/////////////////*/


 var newsletter_form = function(formid, submitbtnid, url){
	var submitbtnhtml = $(submitbtnid).html();
	$(submitbtnid).html('<img src="images/ui-anim_basic_16x16.gif">');
	$(submitbtnid).attr('disabled', 'disabled');
	$('#newsletter_formgroup').removeClass();
	$('#newsletter_formcontrol').html('');


	var data = $(formid).serializeArray();
	alert("Not a valid e-mail address");
	$.ajax({
		type:'post',
		data:data,
		url:data.attr("action"),
		success:function(result){
			alert(result);
			
			$(submitbtnid).removeAttr('disabled');
			$(submitbtnid).html(submitbtnhtml);
			if(result == '1'){
				alert('Register successfully');
				location.reload();
			} else {
				if(result.SubscriberEmail[0]){

					$('#newsletter_formgroup').addClass('has-error');
					$('#newsletter_formcontrol').html(result.SubscriberEmail[0]);
				}  
				
				
		  }
		}
	});
	return false;
  }



	


     /*recruiter dashboard start*/

 var saveJobs = function(formid, submitbtnid, url){
	var submitbtnhtml = $(submitbtnid).html();
	$(submitbtnid).html('<img src="images/ui-anim_basic_16x16.gif">');
	$(submitbtnid).attr('disabled', 'disabled');
	$('#recr_category_group').removeClass();
	$('#recr_category_helpblock').html('');

	$('#recr_subcategory_group').removeClass();
	$('#recr_subcategory_helpblock').html('');

	$('#recr_title_group').removeClass();
	$('#recr_title_helpblock').html('');

	$('#recr_country_group').removeClass();
	$('#recr_country_helpblock').html('');

	$('#recr_state_group').removeClass();
	$('#recr_state_helpblock').html('');

	$('#recr_city_group').removeClass();
	$('#recr_city_helpblock').html('');

	$('#recr_req_group').removeClass();
	$('#recr_req_helpblock').html('');

	$('#recr_exp_group').removeClass();
	$('#recr_exp_helpblock').html('');

	$('#recr_sal_group').removeClass();
	$('#recr_sal_helpblock').html('');

	$('#recr_skill_group').removeClass();
	$('#recr_skill_helpblock').html('');

	$('#recr_cname_group').removeClass();
	$('#recr_cname_helpblock').html('');

	$('#recr_mob1_group').removeClass();
	$('#recr_mob1_helpblock').html('');

	$('#recr_mob2_group').removeClass();
	$('#recr_mob2_helpblock').html('');

	$('#recr_desc_group').removeClass();
	$('#recr_desc_helpblock').html('');
	
	$('#recr_web_group').removeClass();
	$('#recr_web_helpblock').html('');

	$('#recr_industry_group').removeClass();
	$('#recr_industry_helpblock').html('');

	$('#recr_role_group').removeClass();
	$('#recr_role_helpblock').html('');

	$('#recr_sdate_group').removeClass();
	$('#recr_sdate_helpblock').html('');

	$('#recr_edate_group').removeClass();
	$('#recr_edate_helpblock').html('');

	$('#recr_logo_group').removeClass();
	$('#recr_logo_helpblock').html('');

	var data = $(formid).serializeArray();
	$.ajax({
		type:'post',
		data:data,
		url:url,
		success:function(result){
			alert(result);
			
			$(submitbtnid).removeAttr('disabled');
			$(submitbtnid).html(submitbtnhtml);
			if(result == '1'){
				alert('Register successfully');
				location.reload();
			} else {
				if(result.category_id[0]){
					$('#recr_category_group').addClass('has-error');
					$('#recr_category_helpblock').html(result.category_id[0]);
				}  
				if(result.jobTitle[0]){
					$('#recr_title_group').addClass('has-error');
					$('#recr_title_helpblock').html(result.jobTitle[0]);
				}  
				if(result.country[0]){
					$('#recr_country_group').addClass('has-error');
					$('#recr_country_helpblock').html(result.country[0]);
				}  
				if(result.state[0]){
					$('#recr_state_group').addClass('has-error');
					$('#recr_state_helpblock').html(result.state[0]);
				}  

				if(result.city[0]){
					$('#recr_city_group').addClass('has-error');
					$('#recr_city_helpblock').html(result.city[0]);
				}  

				if(result.requirements[0]){
					$('#recr_req_group').addClass('has-error');
					$('#recr_req_helpblock').html(result.requirements[0]);
				}  

				if(result.experiance[0]){
					$('#recr_exp_group').addClass('has-error');
					$('#recr_exp_helpblock').html(result.experiance[0]);
				}  
				if(result.salary_budget[0]){
					$('#recr_sal_group').addClass('has-error');
					$('#recr_sal_helpblock').html(result.salary_budget[0]);
				}  
				if(result.keySkill[0]){
					$('#recr_skill_group').addClass('has-error');
					$('#recr_skill_helpblock').html(result.keySkill[0]);
				}  

				if(result.companyName[0]){
					$('#recr_cname_group').addClass('has-error');
					$('#recr_cname_helpblock').html(result.companyName[0]);
				}  
				if(result.mobileNumber1[0]){
					$('#recr_mob1_group').addClass('has-error');
					$('#recr_mob1_helpblock').html(result.mobileNumber1[0]);
				}  
				if(result.mobileNumber2[0]){
					$('#recr_mob2_group').addClass('has-error');
					$('#recr_mob2_helpblock').html(result.mobileNumber2[0]);
				}  
				if(result.companyDescription[0]){
					$('#recr_desc_group').addClass('has-error');
					$('#recr_desc_helpblock').html(result.companyDescription[0]);
				} 
				if(result.companywebsite[0]){
					$('#recr_web_group').addClass('has-error');
					$('#recr_web_helpblock').html(result.companywebsite[0]);
				} 
				if(result.industries[0]){
					$('#recr_industry_group').addClass('has-error');
					$('#recr_industry_helpblock').html(result.mobileNumber2[0]);
				} 
				if(result.companyRole[0]){
					$('#recr_role_group').addClass('has-error');
					$('#recr_role_helpblock').html(result.companyRole[0]);
				} 
				if(result.datepicker[0]){
					$('#recr_sdate_group').addClass('has-error');
					$('#recr_sdate_helpblock').html(result.datepicker[0]);
				} 
				if(result.datepicker[0]){
					$('#recr_edate_group').addClass('has-error');
					$('#recr_edate_helpblock').html(result.datepicker[0]);
				} 
				if(result.logo[0]){
					$('#recr_logo_group').addClass('has-error');
					$('#recr_logo_helpblock').html(result.logo[0]);
				} 
		  }
		}
	});
	return false;
}
  /*recruiter dashboard end*/




  // jobseeker resume padate

   var jobseeker_resume_update = function(formid, submitbtnid, url){
	var submitbtnhtml = $(submitbtnid).html();
	$(submitbtnid).html('<img src="images/ui-anim_basic_16x16.gif">');
	$(submitbtnid).attr('disabled', 'disabled');
	$('#resume_fname_group').removeClass();
	$('#resume_fname_group_block').html('');

	

	

	var data = $(formid).serializeArray();
	$.ajax({
		type:'post',
		data:data,
		url:url,
		success:function(result){
			alert(result);
			
			$(submitbtnid).removeAttr('disabled');
			$(submitbtnid).html(submitbtnhtml);
			if(result == '1'){
				alert('Register successfully');
				location.reload();
			} else {
				if(result.firstname[0]){
					$('#resume_fname_group').addClass('has-error');
					$('#resume_fname_group_block').html(result.firstname[0]);
				}  
				
				
		  }
		}
	});
	return false;
}
