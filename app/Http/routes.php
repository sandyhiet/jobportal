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
        $subadmin_profile = DB::table('users')->select('*')->where('id', '=', Auth::user()->id)->get();

        return view('admin/homepage_banner', $data)->with('home_slider',$home_slider)->with('admin_profile', $admin_profile)->with('subadmin_profile', $subadmin_profile);
     });

// News Start**********************
     Route::get('admin/allnews', function(){
        $data = array('pagetitle'=>'Homepage Banner');
        // $home_slider = DB::table('home_slider')->select('*')->get();
        $admin_profile = DB::table('admin_profile')->select('*')->get();
        $subadmin_profile = DB::table('users')->select('*')->where('id', '=', Auth::user()->id)->get();
        $news = DB::table('news')->where('status', '=', '1')->orderBy('id', 'desc')->take(5)->get();


        return view('admin/allnews', $data)->with('news',$news)->with('admin_profile', $admin_profile)->with('subadmin_profile', $subadmin_profile);
     });


// News End**********************


    // Route::get('addSlider','controllers\ImageController@getImage');
// work start

   



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
    return view('subscription_confirm', $data)->with('subscriberprofile',$subscriberprofile)->with('header_contact',$header_contact)->with('social_links',$social_links)->with('logo',$logo)->with('menu',$menu)->with('footer_contact',$footer_contact);
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

     Route::get('admin/alltestimonials',function(){
         $admin_profile = DB::table('admin_profile')->select('*')->get();
         $testimonials  = DB::table('testimonials')->select('*')->get();
         $subadmin_profile = DB::table('users')->select('*')->where('id', '=', Auth::user()->id)->get();

        
         return view('admin.alltestimonials')->with('testimonials', $testimonials)->with('admin_profile', $admin_profile)->with('subadmin_profile', $subadmin_profile);
    });


    Route::post('saveAdminProfile', 'aboutUs\aboutusController@saveAdminProfile');
    Route::post('savesubAdminProfile', 'aboutUs\aboutusController@savesubAdminProfile');
    Route::post('updatePassword', 'aboutUs\aboutusController@updatePassword');
    

    /***********ADMIN PROFILE ROUTES END********/




    Route::get('/', function () {
        $contact_usa = DB::table('contact_usa')->select('*')->get();
        $contact_uk = DB::table('contact_uk')->select('*')->get();
        $social_links = DB::table('social_links')->get();
        $results = DB::table('job')->paginate('5');
        $banners = DB::table('home_slider')->select('*')->where('status', '=', 1)->take(5)->get();
        $work_details =DB::table('work_details')->select('*')->where('status', '=', 1)->take(1)->get();
        $tbl_package = DB::table('tbl_package')->select('*')->get();
        $news = DB::table('news')->where('status', '=', '1')->orderBy('id', 'desc')->take(5)->get();
        $testimonials  = DB::table('testimonials')->select('*')->get();
        $filter_gallery = DB::table('filter_gallery')->select('*')->get();
    

      return view('homepage')->with('bodytagid', 'home')->with('banners',$banners)->with('results', $results)->with('work_details', $work_details)->with('tbl_package',$tbl_package)->with('news',$news)->with('testimonials', $testimonials)->with('social_links',$social_links)->with('filter_gallery',$filter_gallery)->with('contact_usa',$contact_usa)->with('contact_uk' ,$contact_uk);
    });


    Route::get('readmore_work_details' ,function(){

            return view('readmore_work_details');
    });

    Route::post('post_contactus_query_from', 'aboutUs\aboutusController@post_contactus_query_from');


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

    // Route::get('company', function () {
    //      $contact_usa = DB::table('contact_usa')->select('*')->get();
    //     $contact_uk = DB::table('contact_uk')->select('*')->get();
    //     $social_links = DB::table('social_links')->get();
    //     $results = DB::table('job')->paginate('5');
    //     $banners = DB::table('home_slider')->select('*')->where('status', '=', 1)->take(5)->get();
    //     $work_details =DB::table('work_details')->select('*')->where('status', '=', 1)->get();
    //     $tbl_package = DB::table('tbl_package')->select('*')->get();
    //     $news = DB::table('news')->where('status', '=', '1')->orderBy('id', 'desc')->take(5)->get();
    //     $testimonials  = DB::table('testimonials')->select('*')->get();
    //     return view('company')->with('banners',$banners)->with('results', $results)->with('work_details', $work_details)->with('tbl_package',$tbl_package)->with('news',$news)->with('testimonials', $testimonials)->with('social_links',$social_links)->with('contact_usa',$contact_usa)->with('contact_uk' ,$contact_uk);;
    // });

    Route::get('blog', function () {
        return view('blog');
    });

    Route::get('post', function () {
        return view('post');
    });

    Route::get('about', function () {
        return view('about');
    });

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

   
    // Route::post('jobseekerregistration','jobController@jobseekerregistration');

    
   
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

            $data = array('pagetitle'=>'Skill');
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
            $all_role_category = DB::table('role_category')->select('*')->get();
            $data = array('pagetitle' => 'All Role Category');
            return view('admin.all_role_category' , $data)->with('all_role_category' ,$all_role_category);
        });

        Route::get('admin/update_role/{id}', function($id){
            
            $data = array('pagetitle'=>'Role');
            $all_role_category  = DB::table('role_category')->select('*')->where('id', '=' ,$id)->get();
            return view('admin/update_role', $data)->with('all_role_category' ,$all_role_category);
            
        });


        Route::post('admin/add_role_category', 'ServiceCategory\categoryController@add_role_category');
        Route::post('admin/all_role_category', 'ServiceCategory\categoryController@all_role_category');
        Route::get('admin/deleteRolecategory/{id}', 'ServiceCategory\categoryController@deleteRolecategory');

        Route::post('admin/update_role',      'ServiceCategory\categoryController@update_role');



        Route::get('admin/social_links', function(){
        $data = array('pagetitle'=>'Social links');
        
        $social_links_count = DB::table('social_links')->select('*')->count();

        if($social_links_count != 7){
            //populate with defaults
            DB::table('social_links')->truncate();
            DB::table('social_links')->insert([
                ['social_network' => 'facebook', 'link' => ''],
                ['social_network' => 'twitter', 'link' => ''],
                ['social_network' => 'pinterest', 'link' => ''],
                ['social_network' => 'youtube', 'link' => ''],
                ['social_network' => 'google_plus', 'link' => ''],
                ['social_network' => 'flickr', 'link' => ''],
                ['social_network' => 'dribbble', 'link' => '']
            ]);
        }

        $social_links = DB::table('social_links')->select('*')->get();

        return view('admin/social_links', $data)->with('social_links',$social_links);
       });
       Route::post('update_social_links', 'homePage\homeSliderController@update_social_links');




       /*****************CMS ROUTS START****************/


        /*****************CMS google Analytics start****************/

        // Route::get('admin/google_analytics', function(){
        //     $data = array('pagetitle'=>'Google Analytics');
        //     $GoogleAnalytics = DB::table('google_analytics')->select('*')->get();
        //     return view('admin/addGoogle_analytics', $data)->with('GoogleAnalytics',$GoogleAnalytics);
        // });

        // Route::post('saveGoogleAnalytics', 'cms\cmsController@saveGoogleAnalytics');

         /*****************CMS google Analytics end****************/

        Route::get('admin/addpage', function(){
            $data = array('pagetitle'=>'Add New Page');
            return view('admin/addpage', $data);
        });



        Route::get('admin/pages', function(){
            $data = array('pagetitle'=>'All Pages');
            $Pages = DB::table('Pages')->select('*')->get();
            return view('admin/pages', $data)->with('Pages', $Pages);
        });
        Route::post('saveNewPage', 'cms\cmsController@saveNewPage');
        Route::get('admin/update_page/{page_title}', function($page_title){
            $data = array('pagetitle'=>'Update Page Content');
            $Page = DB::table('Pages')->select('*')->where('PageTitle', '=', $page_title)->get();
            return view('admin/update_page', $data)->with('Page', $Page);
        });
        Route::post('editPage', 'cms\cmsController@updateCmsPage');
        Route::get('admin/delete_page/{page_title}', function($page_title){
            DB::table('Pages')->where('PageTitle', '=', $page_title)->delete();
            return redirect()->back()->with('message', 'Page Deleted.');
        });
        // Route::get('admin/menu', function(){
        //     $data = array('pagetitle'=>'Navigation');
        //     $menu = DB::table('menu')->select('*')->get();
        //     return view('admin/menu', $data)->with('menu',$menu);
        // });
        // Route::get('admin/menu', function(){
        //     $data = array('pagetitle'=>'Navigation');
        //     return view('admin/menu', $data);
        // });
        // Route::post('saveNavigation', 'cms\cmsController@saveNavigation');
        // Route::get('admin/homepage_contact', function(){
        //     $data = array('pagetitle'=>'Add New Contact');
        //     $contact_usa = DB::table('contact_usa')->select('*')->get();
        //     $contact_uk = DB::table('contact_uk')->select('*')->get();
        //     $footer_contact = DB::table('footer_contact')->select('*')->get();
            
        //     return view('admin/homepage_contact_us', $data)->with('contact_usa', $contact_usa)->with('contact_uk', $contact_uk)->with('footer_contact', $footer_contact);
        // });
        Route::post('saveNewContactuk', 'cms\cmsController@saveNewContactuk');

        Route::post('saveNewContactusa', 'cms\cmsController@saveNewContactusa');

        Route::post('saveFooterContact', 'cms\cmsController@saveFooterContact');
        

        Route::get('admin/alladdress', function(){
            $data = array('pagetitle'=>'Address');
            $contactus_address = DB::table('contactus_address')->get();
            return view('admin/alladdress', $data)->with('contactus_address', $contactus_address);
        });
        Route::get('admin/add_address', function(){
            $data = array('pagetitle'=>'Add Address');
            return view('admin/add_address', $data);
        });
        Route::post('add_address', 'cms\cmsController@add_address');
        Route::get('admin/update_address/{id}', function($id){
            $data = array('pagetitle'=>'Update Address');
            $contactus_address = DB::table('contactus_address')->where('id', '=', $id)->get();
            return view('admin/update_address', $data)->with('contactus_address', $contactus_address);
        });
        Route::post('admin/update_address', 'cms\cmsController@update_address');
        Route::get('admin/delete_address/{id}', function($id){
            DB::table('contactus_address')->where('id', '=', $id)->delete();
            return redirect()->back()->with('message', 'Address Deleted.');
        });
        Route::get('admin/queries', function(){
            $data = array('pagetitle'=>'Queries');
            $contactus_queries = DB::table('contactus_queries')->orderBy('id', 'desc')->get();
            return view('admin/queries', $data)->with('contactus_queries', $contactus_queries);
        });
        Route::get('admin/delete_queries/{id}', function($id){
            DB::table('contactus_queries')->where('id', '=', $id)->delete();
            return redirect('admin/queries')->with('message', 'Message Deleted.');
        });
        Route::get('admin/read_query/{id}', function($id){
            $data = array('pagetitle'=>'Query');
            $contactus_query = DB::table('contactus_queries')->where('id', '=', $id)->get();
            $contactus_query_update = DB::table('contactus_queries')->where('id', '=', $id)->update([
                'status'=>1
            ]);
            return view('admin/read_query', $data)->with('contactus_query', $contactus_query);
        });

        // Route::get('admin/about_kbf', function(){
        //     $data = array('pagetitle'=>'about_kbf');
        //     $organizer_detail= DB::table('organizer_detail')->select('*')->get();
        //     return view('admin/about_kbf', $data)->with('organizer_detail',$organizer_detail);
        // });
        // Route::post('save_aboutkbf', 'cms\cmsController@save_Aboutkbf');

        // Route::get('admin/kbf_map', function(){
        //     $data = array('pagetitle'=>'KBF Map');
        //     $map_links= DB::table('map_link')->select('*')->get();
        //     return view('admin/kbf_map', $data)->with('map_links',$map_links);
        // });

        // Route::post('saveKbfMap', 'cms\cmsController@saveKbfMap');



        /*****************CMS ROUTS END****************/



        /*****************SUBSCRIBE ROUTS START****************/

        
        Route::get('admin/subscriber', function(){
            $data = array('pagetitle'=>'Subscriber');
            $subscriber = DB::table('subscriber')->where('status', 1)->orderBy('id', 'desc')->get();
            return view('admin/subscriber', $data)->with('subscriber', $subscriber);
        });
        Route::get('admin/deletesubscriber/{id}', 'Subscriber\SubscroberController@deletesubscriber');

        /*****************SUBSCRIBE ROUTS END****************/


        
        /***********ADMIN Broadcast ROUTES START********/

        Route::get('admin/composemail', function(){
                        $data = array('pagetitle'=>'Compose Mail');                         
                        return view('admin.mailbroadcast', $data);
        });

        Route::post('postComposeEmail', 'Subscriber\SubscroberController@composemail');

        /***********ADMIN Broadcast ROUTES END********/




         Route::get('admin/work/{id}', function(){
            $data = array('pagetitle'=>'Work Details');
            $work_details = DB::table('work_details')->select('*')->get();
            $admin_profile = DB::table('admin_profile')->select('*')->get();
            $subadmin_profile = DB::table('users')->select('*')->where('id', '=', Auth::user()->id)->get();

            return view('admin/work', $data)->with('work_details',$work_details)->with('admin_profile', $admin_profile)->with('subadmin_profile', $subadmin_profile);
         });

        Route::post('admin/work', 'homePage\homeSliderController@updatework');
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



        /*/////////////Testimonials Start//////////////////*/

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

        /*//////////////happy clients//////////////////////////*/

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

        ///////////////////////////////// Admin Relate Work End /////////////////////////////////////////////


       
  });


/*****************JOB PORTAL FRONT ROUTE START****************/
    

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

         Route::get('jobs',function(){

            return view('jobs');
         });


});


/********Start Recruiter Route ******/


Route::get('recruiter_login', function() {
    return view('recruiter/recruiter_login');
});

Route::get('recruiter_registration', function() {
    return view('recruiter/recruiter_registration');
});

Route::post('saverecruiterRegistration', 'jobController@saverecruiterRegistration');


Route::get('recruiterregistration/{id}/{hashvalue}', function ($id) {

    DB::table('users')->where('id','=',$id)->update([
            
            'activeAccount' =>1
        ]);
    return view('recruiter.recruiter_login');
});

Route::post('saverecruiterLogin' ,'Auth\AuthAndRoleController@saverecruiterLogin');

Route::get('recruiter_forgotpassword', function() {
    return view('recruiter/recruiterforgotpassword');
});

Route::post('recruiterresetpassword' ,'Auth\AuthAndRoleController@recruiterresetpassword');

Route::get('recruiterresetpassword/{id}/{hashvalue}', function ($id) {
   
    $userprofile = DB::table('users')->select('*')->where('id','=',$id)->get();

    return view('recruiter/recruiter_reset_password')->with('userprofile',$userprofile);
});

Route::post('recruiter_update_resetpassword', 'Auth\AuthAndRoleController@update_resetpassword');

Route::get('recruiter_logout', 'Auth\AuthAndRoleController@recruiter_logout');


Route::get('recruiter_jobspost', function() {
    return view('recruiter/recruiter_job_post');
});

Route::post('saverecruiterjobpost', 'jobController@recruiterjobpost');



/********End Recruiter Route ******/






 Route::post('saveJobs', 'job\jobController@insertJobs');

    
    Route::post('recruiterlogin' ,'Auth\AuthAndRoleController@recruiterlogin');

    Route::post('jobrecruiter','jobController@jobrecruiter');

        
    Route::post('jobseekerlogin' ,'Auth\AuthAndRoleController@jobseeker_login');

    Route::post('jobseekerRegistartion','jobController@jobseekerRegistartion');



/*****************JOB PORTAL FRONT ROUTE END****************/
