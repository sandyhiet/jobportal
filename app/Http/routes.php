<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

    // Route::get('day',function(){
    //     return date('d/m/Y', strtotime('+3 days'));
    // });
    Route::get('admin', function () {
        $data = array('pagetitle'=>'Welcome Admin');
        return view('admin/adminlogin', $data);
    });


    Route::post('admin/postLogin', 'Auth\AuthAndRoleController@postLogin');
    
    Route::post('saveFeedback', 'cms\cmsController@saveFeedback');

    // homeslide start**********************************

    Route::get('admin/homepage_banner', function(){
        $data = array('pagetitle'=>'Homepage Banner');
        $home_slider = DB::table('home_slider')->select('*')->get();
        $admin_profile = DB::table('admin_profile')->select('*')->get();
        
        // $subadmin_profile = DB::table('users')->select('*')->where('id', '=', Auth::user()->id)->get();

        return view('admin/homepage_banner', $data)->with('home_slider',$home_slider)->with('admin_profile', $admin_profile);
     });

// News Start**********************
Route::get('read_news/{id}', function($newsTitle){
$news = DB::table('news')->where('newsTitle', '=', '$newsTitle')->get();

return view('read_news')->with('news',$news);
});


     Route::get('admin/allnews', function(){
        $data = array('pagetitle'=>'Homepage Banner');
        // $home_slider = DB::table('home_slider')->select('*')->get();
        $admin_profile = DB::table('admin_profile')->select('*')->get();
        // $subadmin_profile = DB::table('users')->select('*')->where('id', '=', Auth::user()->id)->get();
        $news = DB::table('news')->where('status', '=', '1')->orderBy('id', 'desc')->take(5)->get();


        return view('admin/allnews', $data)->with('news',$news)->with('admin_profile', $admin_profile);
     });

     Route::get('admin/addNews', function(){
        $data = array('pagetitle'=>'Add News Article');
        // $news_category = DB::table('news_category')->select('*')->get();
        return view('admin.addNews', $data);
    });
     Route::post('saveNews', 'news\newsController@insertNews');
     Route::post('updateNews', 'news\newsController@updateNews');
     Route::get('deleteNews/{id}', 'news\newsController@Delete_news');



      Route::get('admin/edit_news/{id}', function($id){
                $data = array('pagetitle'=>'job_update');
                $news = DB::table('news')->select('*')->where('id', '=', $id)->get();

                // $slider = DB::table('home_slider')->select('*')->where('id', '=', $id)->get();
                // $category = DB::table('tbl_category')->where('category_id', '=', $id)->get();
                return view('admin/updatenews', $data)->with('news', $news);
        });
     // Route::get('admin/edit_news/{id}', 'news\newsController@editNews');


// News End**********************


    // Route::get('addSlider','controllers\ImageController@getImage');
// work start

    Route::get('admin/work', function(){
        $data = array('pagetitle'=>'Homepage Banner');
        $work_details = DB::table('work_details')->select('*')->get();
        $admin_profile = DB::table('admin_profile')->select('*')->get();
        $subadmin_profile = DB::table('users')->select('*')->where('id', '=', Auth::user()->id)->get();

        return view('admin/work', $data)->with('work_details',$work_details)->with('admin_profile', $admin_profile)->with('subadmin_profile', $subadmin_profile);
     });

    Route::post('work', 'homePage\homeSliderController@insertwork');
     // end work

     
    Route::post('addSlider', 'homePage\homeSliderController@insertHomeSlider');


    Route::get('deleteSliderImage/{id}', 'homePage\homeSliderController@deleteslider');
    
    Route::get('editSliderImage/{id}', function($id){
                $data = array('pagetitle'=>'job_update');
                $slider = DB::table('home_slider')->select('*')->where('id', '=', $id)->get();
                // $category = DB::table('tbl_category')->where('category_id', '=', $id)->get();
                return view('admin/update_homebanner', $data)->with('slider', $slider);
        });

    
    Route::get('editSliderImage/{id}', 'homePage\homeSliderController@edittHomeSlider');
    Route::post('updateSlider', 'homePage\homeSliderController@UpdatetHomeSlider');

    // homeslider end*************************************



    /*subscriber email start*/
    Route::post('subscribenewsletter', 'Subscriber\SubscroberController@subscribe');

    Route::get('mailconfirm/{id}/{hashvalue}', function ($id) {
      //return "vc";
    DB::table('subscriber')->where('id','=',$id)->update([
            
            'status' =>1
        ]); 
    $subscriberprofile = DB::table('subscriber')->select('*')->where('id','=',$id)->get();
    $header_contact = DB::table('header_contact')->get();
    $social_links = DB::table('social_links')->get();
    $logo = DB::table('logo')->select('*')->get();
    $menu = DB::table('menu')->select('*')->get();
    $footer_contact  = DB::table('footer_contact')->select('*')->get();
    $data = array('pagetitle'=>'Subscription Confirm');
    DB::table('mailsubscriber_id')->where('subscriber_id', '=', $id)->delete();
    return view('subscription_confirm', $data)->with('subscriberprofile',$subscriberprofile)->with('header_contact',$header_contact)->with('social_links',$social_links)->with('logo',$logo)->with('social_links',$social_links)->with('menu',$menu)->with('footer_contact',$footer_contact);
    });

    /*subscriber email end*/



    /***********ADMIN PROFILE ROUTES START********/

 

    Route::get('admin/list_membership',function(){

        $tbl_package = DB::table('tbl_package')->select('*')->get();
        $admin_profile = DB::table('admin_profile')->select('*')->get();
        $subadmin_profile = DB::table('users')->select('*')->where('id', '=', Auth::user()->id)->get();
        return view('admin.list_membership')->with('tbl_package', $tbl_package)->with('admin_profile', $admin_profile)->with('subadmin_profile', $subadmin_profile);
    });

    Route::post('updatepackage', 'homePage\homeSliderController@Updatetpackage');



    Route::get('admin_profile', function(){
        $data = array('pagetitle'=>'Admin Profile');
        $admin_profile = DB::table('admin_profile')->select('*')->get();
        $subadmin_profile = DB::table('users')->select('*')->where('id', '=', Auth::user()->id)->get();
        return view('admin.admin_profile', $data)->with('admin_profile', $admin_profile)->with('subadmin_profile', $subadmin_profile);
    });




    // start testimonials/////////////////////

    Route::get('testimonial', function(){
        $data = array('pagetitle'=>'testimonials');
        $testimonials  = DB::table('testimonials')->select('*')->get();
        return view('testimonial', $data)->with('testimonials', $testimonials);
    });

     Route::get('admin/alltestimonials',function(){
         $admin_profile = DB::table('admin_profile')->select('*')->get();
         $testimonials  = DB::table('testimonials')->select('*')->get();
         // $subadmin_profile = DB::table('users')->select('*')->where('id', '=', Auth::user()->id)->get();

        
         return view('admin.alltestimonials')->with('testimonials', $testimonials)->with('admin_profile', $admin_profile);
    });

     Route::get('admin/addtestimonials',function(){
         // $admin_profile = DB::table('admin_profile')->select('*')->get();
         // $testimonials  = DB::table('testimonials')->select('*')->where('id', '=', $id)->get()
         // $subadmin_profile = DB::table('users')->select('*')->where('id', '=', Auth::user()->id)->get();

        
         return view('admin.addtestimonials');
    });

      Route::get('admin/editTestimonial/{id}',function($id){
         $admin_profile = DB::table('admin_profile')->select('*')->get();
         $testimonials  = DB::table('testimonials')->select('*')->where('id', '=', $id)->get();
         // $subadmin_profile = DB::table('users')->select('*')->where('id', '=', Auth::user()->id)->get();
         return view('admin.updatetestimonials')->with('testimonials', $testimonials)->with('admin_profile', $admin_profile);
    });
    Route::post('saveTestimonial', 'testimonial\testimonialController@insertTestimonial');
   
    Route::post('updateTestimonials', 'testimonial\testimonialController@updateTestimonials');
    Route::get('admin/deletetestimonial/{id}', 'testimonial\testimonialController@deletetestimonial');

// testimonials ends///////////////////////



    Route::post('saveAdminProfile', 'aboutUs\aboutusController@saveAdminProfile');
    Route::post('savesubAdminProfile', 'aboutUs\aboutusController@savesubAdminProfile');
    Route::post('updatePassword', 'aboutUs\aboutusController@updatePassword');




     Route::get('admin/clients_happy',function(){

        

        $filter_gallery = DB::table('filter_gallery')->select('*')->get();
        // $subadmin_profile = DB::table('users')->select('*')->where('id', '=', Auth::user()->id)->get();
        return view('admin.clients_happy')->with('filter_gallery', $filter_gallery);
    });

    Route::post('Gallery_clients', 'client\clientController@Gallery_clients');

    Route::get('delete_clients/{id}', 'client\clientController@delete_clients');


      Route::get('admin/update_clients/{id}',function($id){
         $filter_gallery = DB::table('filter_gallery')->select('*')->where('id', '=', $id)->get();
         // $testimonials  = DB::table('testimonials')->select('*')->get();
         // $subadmin_profile = DB::table('users')->select('*')->where('id', '=', Auth::user()->id)->get();
         return view('admin.update_clients')->with('filter_gallery', $filter_gallery);
    });
      	Route::post('update_images', 'client\clientController@update_images');




    /***********ADMIN PROFILE ROUTES END********/




    Route::get('/', function () {
        $results = DB::table('job')->paginate('5');
        $banners = DB::table('home_slider')->select('*')->where('status', '=', 1)->take(5)->get();
        $tbl_package = DB::table('tbl_package')->select('*')->get();
        $news = DB::table('news')->where('status', '=', '1')->orderBy('id', 'desc')->take(5)->get();
        $testimonials  = DB::table('testimonials')->select('*')->get();
        $filter_gallery = DB::table('filter_gallery')->select('*')->get();


     return view('homepage')->with('bodytagid', 'home')->with('banners',$banners)->with('results', $results)->with('tbl_package',$tbl_package)->with('news',$news)->with('testimonials', $testimonials)->with('filter_gallery', $filter_gallery);
    });



    Route::get('jobs', function () {
        return view('jobs');
    });

    Route::get('candidates', function () {
        return view('candidates');
    });


    Route::get('job-details', function () {
        return view('job-details');
    });
    Route::get('post-a-resume', function () {
        return view('post-a-resume');
    });
    Route::get('resume', function () {
        return view('resume');
    });

    Route::get('company', function () {
        return view('company');
    });

    Route::get('blog', function () {
        return view('blog');
    });

    Route::get('admin/addblogs', function () {
        return view('admin.Blog.addblogs');
    });
    Route::get('admin/viewall_blogs', function () {

    	$blogs = DB::table('blogs')->select('*')->get();
		
	    return view('admin.Blog.viewall_blogs')->with('blogs', $blogs);
    });


    Route::get('admin/Blog/edit_blogs/{id}', function ($id) {
    	$data = array('pagetitle'=>'blogs');
    	$blogs = DB::table('blogs')->select('*')->select('*')->where('id', '=', $id)->get();

        return view('admin.Blog.updateblogs', $data)->with('blogs', $blogs);
    });

    // Route::get('admin/Blog/delete_blogs/{id}', function($id){
    // 	return 'hjgdh';
    // 	 DB::table('blogs')->where('id', $id)->delete();
    // 	return view('admin.Blog.viewall_blogs');
    // });
    Route::post('Addblogs', 'Blog\blogController@Addblogs');
    Route::post('updateblogs', 'Blog\blogController@updateblogs');
    Route::get('admin/delete_blogs/{id}', 'Blog\blogController@delete_blogs');





    Route::get('post', function () {
        return view('post');
    });

    Route::get('about', function () {
    	$about_us=DB::table('about_us')->select('*')->get();
    	$OurTeam = DB::table('aboutus_our_team')->select('*')->get();
    	$testimonials  = DB::table('testimonials')->select('*')->get();
    	$about_us=DB::table('about_us')->select('*')->get();
        return view('about')->with('about_us', $about_us)->with('OurTeam', $OurTeam)->with('testimonials', $testimonials)->with('about_us', $about_us);
    });
     Route::get('admin/about_us', function () {
    	$about_us=DB::table('about_us')->select('*')->get();
        return view('admin.aboutus.about_us')->with('about_us', $about_us);
    });
    Route::post('about_Content', 'aboutUs\aboutusController@about_Content');


Route::get('add_our_team', function(){
		$data = array('pagetitle'=>'Add Our Team');
		// $admin_profile = DB::table('admin_profile')->select('*')->get();
		return view('admin.aboutus.add_our_team', $data);
	});

Route::get('all_our_team', function(){
		$data = array('pagetitle'=>'Add Our Team');
		$OurTeam = DB::table('aboutus_our_team')->select('*')->get();
		return view('admin.aboutus.all_our_team', $data)->with('OurTeam', $OurTeam);
	});

	Route::post('saveOurTeam', 'aboutUs\aboutusController@saveOurTeam');

	// Route::get('all_our_team', 'aboutUs\aboutusController@all_ourTeam');

	Route::get('admin/edit_ourTeam/{id}', function($id){
		$data = array('pagetitle'=>'Edit Our Team');
		$ourTeam = DB::table('aboutus_our_team')->select('*')->where('id', '=', $id)->get();
		
	    return view('admin.aboutus.update_our_team', $data)->with('ourTeam', $ourTeam);
	});

	Route::post('updateOurTeam', 'aboutUs\aboutusController@updateOurTeam');
	Route::get('deleteOurTeam/{id}', 'aboutUs\aboutusController@deleteOurTeam');



    Route::get('testimonials', function () {
        return view('testimonials');
    });

    Route::get('options', function () {
        return view('options');
    });

    Route::get('ajaxData' ,function(){
        return view('ajaxData');
    });

Route::get('date',function(){
    return view('date');
});
    /////////////////////OUT  OF MIDDLEWARE START/////////////////////////////////

    Route::post('saveJobs', 'job\jobController@insertJobs');

    
    Route::post('recruiterlogin' ,'Auth\AuthAndRoleController@recruiterlogin');

    Route::post('jobrecruiter','jobController@jobrecruiter');

        
    Route::post('jobseekerlogin' ,'Auth\AuthAndRoleController@jobseekerlogin');

    Route::post('jobseekerRegistartion','jobController@jobseekerRegistartion');

    
    Route::get('countries_json', function(){
    return DB::table('tbl_country')->select('country_name')->get();
    });
    Route::get('state_json', function(){
    return DB::table('tbl_state')->select('state_name', 'state_id')->get();
    });
    Route::get('district_json/{state_name}', function($state_name){
    $tbl_state = DB::table('tbl_state')->select('state_id')->where('state_name', '=', $state_name)->get();
    return $tbl_city= DB::table('tbl_city')->select('city_name', 'id')->where('state_id', '=', $tbl_city[0]->state_id)->get();
    });

      /////////////////////OUT  OF MIDDLEWARE END/////////////////////////////////






     //AUTH PROCTED ROUTE & Admin Related WorK//////////////////

   Route::group(['middleware' => 'checkAdminAuth'],function(){


     Route::get('logout', 'Auth\AuthController@userLogout');

     Route::get('admin/dashboard', function () {
            $data = array('pagetitle'=>'Dashboard');
            $volunteer_count = DB::table('users')->where('status', '=', '0')->where('usertype', '=', 'superadmin')->count();

            $admin_profile = DB::table('admin_profile')->select('*')->get();
            $subadmin_profile = DB::table('users')->select('*')->where('id', '=', Auth::user()->id)->get();
            return view('admin/dashboard', $data)->with('volunteer_count', $volunteer_count)->with('admin_profile', $admin_profile)->with('subadmin_profile', $subadmin_profile);
        });


        Route::get('getsubcatbyid/{catid}', function($catid){
            return DB::table('tbl_sub_category')->where('category_id', $catid)
            ->select('sub_category_id', 'sub_category_title')->get();
        });



      
        /*****************Recruiter Category of Admin START****************/

        Route::get('admin/add_category', function(){
            $data = array('pagetitle'=>'Add Category');
            return view('admin.add_category', $data);
        });

        Route::get('admin/add_sub_category', function(){
            $data = array('pagetitle'=>'Add Category');
            return view('admin.add_sub_category', $data);
        });

        Route::post('add_Category', 'ServiceCategory\categoryController@add_Category');
        Route::post('add_Sub_Category','ServiceCategory\categoryController@add_Sub_Category');
        Route::get('admin/all_category', 'ServiceCategory\categoryController@all_category');

        Route::get('admin/edit_subcategory/{id}', function($id){
            $data = array('pagetitle'=>'Edit  Category');
            $subcat = DB::table('tbl_sub_category')->where('sub_category_id', $id)->get();
            $subcatname = $subcat[0]->sub_category_title;
            return view('admin/update_subcategory', $data)->with('subcatname', $subcatname)->with('id', $id);
        });

        
        Route::post('update_sub_category',  'ServiceCategory\categoryController@update_sub_category');

        Route::post('updateCategory',      'ServiceCategory\categoryController@updateCategory');

        Route::get('deletesubcategory/{id}', 'ServiceCategory\categoryController@deletesubcategory');
        

        /*///////////////////////////Keyskills//////////////////////////////////////////////*/

        Route::get('admin/add_keyskills', function(){
            $data = array('pagetitle'=>'Add Keyskills');
            return view('admin.add_keyskills', $data);
        });

        Route::get('admin/all_keyskills' , function(){
            $all_keyskills = DB::table('keyskills')->select('*')->get();
            $data = array('pagetitle' => 'All Keyskills');
            return view('admin.all_keyskills' ,$data)->with('all_keyskills', $all_keyskills);
         });

        Route::get('admin/update_skill/{id}', function($id){

            $data = array('pagetitle'=>'Category');
            $all_keyskills = DB::table('keyskills')
            ->select('*')->where('id', '=', $id)->get();

            return view('admin.update_skill', $data)
            ->with('all_keyskills', $all_keyskills);
            
        });

        Route::post('admin/add_keyskills', 'ServiceCategory\categoryController@add_keyskills');
        Route::post('admin/all_keyskills', 'ServiceCategory\categoryController@all_keyskills');
        Route::get('deletekeyskill/{id}', 'ServiceCategory\categoryController@deletekeyskill');

        Route::post('admin/update_skill',      'ServiceCategory\categoryController@update_skill');



        /*//////////////////////////Role Category///////////////////////////////////////////////////*/

        Route::get('admin/add_role_category', function(){
             $data = array('pagetitle'=>'Add Role Category');
            return view('admin.add_role_category', $data);

        });
        Route::get('admin/all_role_category' , function(){

            $data = array('pagetitle' => 'All Role Category');
            return view('admin.all_role_category' , $data);
        });

        Route::get('update_role/{id}', function($id){
            
            $data = array('pagetitle'=>'Role');
            // $all_keyskills = DB::table('keyskills')->select('*')->select('*')->where('id', '=', $id)->get();
            return view('admin/update_role', $data);
            
        });


         Route::post('admin/add_role_category', 'ServiceCategory\categoryController@add_role_category');
        Route::post('admin/all_role_category', 'ServiceCategory\categoryController@all_role_category');
        Route::get('deletekeyskill/{id}', 'ServiceCategory\categoryController@deletekeyskill');

        Route::post('update_role',      'ServiceCategory\categoryController@update_role');

        ///////////////////////////////// Admin Relate Work End /////////////////////////////////////////////


       
   });



    

Route::group(['middleware' => 'checkFrontAuth'], function(){

     ////////////////////jobseeker start//////////////////////

    Route::get('frontlogout', 'Auth\AuthAndRoleController@frontlogout');
    

    Route::get('jobseeker_dashboard',function(){
        return view('jobseeker_dashboard');
    });

    Route::get('jobseeker/post_resume', function(){
        $data = array('pagetitle'=>'Job Post');
        return view('jobseeker.post_resume', $data);
    });



        Route::get('jobseeker/allresume_list', function(){
        $data = array('pagetitle'=>'all Post');
        $resume_post = DB::table('resume_post')->select('*')->get();
        return view('jobseeker.allresume_list', $data)->with('resume_post',$resume_post);
            });



        Route::get('jobseeker/viewdetail', function(){
                $data = array('pagetitle'=>'viewdetail');
                // $resume_post = DB::table('resume_post')->select('*')->where('id', '=', $id)->get();
               $resume_post = DB::table('resume_post')->select('*')->get();

                return view('jobseeker.viewdetail', $data)->with('resume_post', $resume_post);
        });
         
        Route::post('save_resume', 'job\jobController@resume_post');

         Route::get('delete_resume/{id}', 'job\jobController@resume_delete');



         // file  upload


        Route::get('fileentry', 'FileEntryController@index');
        Route::get('fileentry/get/{filename}', [
            'as' => 'getentry', 'uses' => 'FileEntryController@get']);
        Route::post('fileentry/add',[ 
                'as' => 'addentry', 'uses' => 'FileEntryController@add']);



         // file upload



        //  Route::get('jobseeker/resume_update/{id}', function($id){
        //         $data = array('pagetitle'=>'viewdetail');
        //         $resume_post = DB::table('resume_post')->select('*')->where('id', '=', $id)->get();
        //         return view('jobseeker/resume_update', $data)->with('resume_post', $resume_post);
        // });
          Route::get('jobseeker/resume_update/{id}', function($id){
                $data = array('pagetitle'=>'viewdetail');
                $resume_post = DB::table('resume_post')->select('*')->where('id', $id)->get();

                // $resume_post = DB::table('resume_post')->get();
                return view('jobseeker/resume_update', $data)->with('resume_post', $resume_post);
        });

         Route::post('jobseeker_resume_update', 'job\jobController@jobseeker_resume_update');


        Route::post('saveResumePost', 'jobseeker\jobseekerController@saveResumePost');

        Route::get('update_your_detail', function () {
            if(Auth::check() && Auth::user()->usertype == 'jobseeker'){
                //return 'go to update page';
                 $users = DB::table('users')->where('id', '=', Auth::user()->id)->get();
                 $personal_details = DB::table('jobseeker_persional')->where('job_seeker_id', '=', Auth::user()->id)->get();
                 $education_details = DB::table('jobseeker_education')->where('job_seeker_id', '=', Auth::user()->id)->get();
                 $experience_details = DB::table('jobseeker_experience')->where('job_seeker_id', '=', Auth::user()->id)->get();
                 $socialnetwork_details = DB::table('jobseeker_socialnetwork')->where('job_seeker_id', '=', Auth::user()->id)->get();
                 return view('update_jobseeker')->with('users',$users)->with('personal_details',$personal_details)->with('education_details',$education_details)->with('experience_details',$experience_details)->with('socialnetwork_details',$socialnetwork_details);
            } else {
                return redirect('/');
            }
            
        });

        Route::get('jobseeker/jobseeker_profile', function(){
        $data = array('pagetitle'=>'Admin Profile');
        $admin_profile = DB::table('admin_profile')->select('*')->get();
        $work_details = DB::table('work_details')->select('*')->get();

        $subadmin_profile = DB::table('users')->select('*')->where('id', '=', Auth::user()->id)->get();
        return view('jobseeker/jobseeker_profile', $data)->with('admin_profile', $admin_profile)->with('subadmin_profile', $subadmin_profile)->with('work_details', $work_details);
    });

        Route::post('AdminProfile', 'jobseeker\jobseekerController@savesubAdminProfile');
        Route::post('updatePassword', 'jobseeker\jobseekerController@updatePassword');



        Route::post('editjobseekerpassword', 'jobseeker\jobseekerController@editjobseekerpassword');
        Route::post('saveResumePost', 'jobseeker\jobseekerController@saveResumePost');
        Route::post('editjobseekerPersonalDetails', 'jobseeker\jobseekerController@editjobseekerPersonalDetails');
        Route::post('editjobseekerEducationDetails', 'jobseeker\jobseekerController@editjobseekerEducationDetails');
        Route::post('editjobseekerExperienceDetails', 'jobseeker\jobseekerController@editjobseekerExperienceDetails');
        Route::post('check_js_mail', 'jobseeker\jobseekerController@check_js_mail');
        Route::post('editjobseekersocialnetworkDetails', 'jobseeker\jobseekerController@editjobseekersocialnetworkDetails');
        Route::post('editjobseekerResume', 'jobseeker\jobseekerController@editjobseekerResume');

       
            

            ///////////////////|||\\    RECRUITER   \\\</////////////////////////////////////>
        

        Route::get('recruiter_dashboard', function() {
            return view('recruiter_dashboard');
        });

        Route::get('recruiter_dashboard/upgradeplan', function() {
            return view('recruiter.upgrade');
        });

        Route::post('packageupdate/{id}','jobController@packageupdate');

        Route::get('recruiter/post_job', function(){
        $data = array('pagetitle'=>'Job Post');
         return view('recruiter.post_job', $data);
            });

        Route::get('recruiter/package', function(){
            $data = array('pagetitle' => 'Plan');
            return view('recruiter.package' ,$data);
        });

        Route::get('recruiter/viewdetail_job/{id}', function($id){
                $data = array('pagetitle'=>'viewdetail');
                $job = DB::table('job_post')->select('*')->where('id', '=', $id)->get();
                return view('recruiter.viewdetail_job', $data)->with('job', $job);
        });


        Route::get('recruiter/allpost', function(){
        $data = array('pagetitle'=>'all Post');
        $job = DB::table('job_post')->select('*')->get();
        return view('recruiter.allpost', $data)->with('job',$job);
            });


        Route::get('recruiter/job_update/{id}', function($id){
                $data = array('pagetitle'=>'job_update');
                $job = DB::table('job_post')->select('*')->where('id', '=', $id)->get();
                $category = DB::table('tbl_category')->where('category_id', '=', $id)->get();
                return view('recruiter/job_update', $data)->with('job', $job);
        });
        Route::get('up_downgrade/{email}', function($email){
                $data = array('pagetitle'=>'job_update');
                $tbl_package = DB::table('tbl_package')->select('*')->get();
                // $category = DB::table('tbl_category')->where('category_id', '=', $id)->get();
                return view('recruiter/up_downgrade', $data)->with('job', $job);
        });

        Route::get('recruiter/recruiter_profile', function(){
        $data = array('pagetitle'=>'Admin Profile');
        $admin_profile = DB::table('admin_profile')->select('*')->get();
        $subadmin_profile = DB::table('users')->select('*')->where('id', '=', Auth::user()->id)->get();
        return view('recruiter/recruiter_profile', $data)->with('admin_profile', $admin_profile)->with('subadmin_profile', $subadmin_profile);
        });

        Route::post('AdminProfile', 'job\jobController@AdminProfile');
        Route::post('updatePassword', 'job\jobController@updatePassword');


        Route::post('recruiter_update', 'job\jobController@recruiter_update');

        Route::get('delete_job/{id}', 'job\jobController@job_delete');


        Route::get('job_listing', 'job\jobController@jobs');




});
