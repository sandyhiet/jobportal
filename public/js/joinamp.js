appdomain = 'http://192.168.1.158/jobportal/public/';
//appdomain = 'http://localhost/amp_front/public/';
$(function(){
	$('#currentCont').change(function(){
		$('.wrapperCurrentCityDist').hide();
		var thisval = $(this).val();
		if(thisval == 'IN'){
			$('#wrapperCurrentCityDist_india').show();
			$('#CurrentState, #CurrentDistrict').attr('validationType', '');
			$('#CurrentState_ind, #CurrentDistrict_ind').attr('validationType', 'iipl_required');
		} else {
			$('#wrapperCurrentCityDist_oth').show();
			$('#CurrentState, #CurrentDistrict').attr('validationType', 'iipl_required');
			$('#CurrentState_ind, #CurrentDistrict_ind').attr('validationType', '');
		}
	});

	$('#CurrentState_ind').change(function(){
		var state_name = $(this).val();
		//alert(StateName);
		$('#CurrentDistrict_ind').html('<option value="">Select</option>');
		$.ajax({
			type:'GET',
			url:appdomain+'district_json/'+state_name,
			success:function(result){
         result = $.parseJSON(result);
				
				for(var i=0; i<result.length; i++){
					console.log(result[i].city_name);
					$('#CurrentDistrict_ind').append('<option value="'+result[i].city_name+'">'+result[i].city_name+'</option>');	
				}
			},
			error: function (xhr,status,error) {
	            alert("Status: " + status);
	            alert("Error: " + error);
	            alert("xhr: " + xhr.readyState);
	        }
		});
	});

	$('#state').change(function(){
		var state_name = $(this).val();
		//alert(StateName);
		$('#city_name').html('<option value="">Select</option>');
		$.ajax({
			type:'GET',
			url:appdomain+'district_json/'+state_name,
			success:function(result){
			//alert(result);
			//result = $.parseJSON(result);
				
				for(var i=0; i<result.length; i++){
					//console.log(result[i].DistrictName);
					$('#city').append('<option value="'+result[i].id+'">'+result[i].city_name+'</option>');	
				}
			},
			error: function (xhr,status,error) {
	            alert("Status: " + status);
	            alert("Error: " + error);
	            alert("xhr: " + xhr.readyState);
	        }
		});
	});
});